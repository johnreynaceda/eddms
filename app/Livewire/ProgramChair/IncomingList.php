<?php

namespace App\Livewire\ProgramChair;

use App\Events\SendNotification;
use App\Models\Category;
use App\Models\Document;
use App\Models\DocumentRecipient;
use App\Models\Faculty;
use App\Models\Notification;
use App\Models\Program;
use App\Models\ProgramChair;
use App\Models\Shop\Product;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class IncomingList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(DocumentRecipient::query()->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC'))
            ->columns([
                TextColumn::make('document.document_code')->label('DOCUMENT CODE')->icon('heroicon-o-document-text')->iconColor('success')->searchable(),
                ViewColumn::make('id')->label('RECIPIENT')->view('filament.tables.recipient')->searchable(
                    query: function ($query, $search) {
                        return $query->whereHas('document', function ($q) use ($search) {
                            $q->whereHas('user', function ($t) use ($search) {
                                $t->where('name', 'like', "%{$search}%");
                            });
                        });
                    }
                ),
                ViewColumn::make('details')->label('DETAILS')->view('filament.tables.detail')->searchable(
                    query: function ($query, $search) {
                        return $query->whereHas('document', function ($q) use ($search) {
                            $q->whereHas('category', function ($t) use ($search) {
                                $t->where('name', 'like', "%{$search}%")
                                    ->orWhereHas('classification', function ($c) use ($search) {
                                        $c->where('name', 'like', "%{$search}%");
                                    });
                            });
                        });
                    }
                ),

                TextColumn::make('document.date_of_letter')->date()->label('DATE OF LETTER')->searchable(),
                TextColumn::make('document.deadline')->date()->label('DEADLINE')->searchable(),

                TextColumn::make('is_read')
                    ->label('STATUS')
                    ->searchable()
                    ->badge()->formatStateUsing(
                        fn($record) => $record->is_read ? 'Viewed' : 'Awaiting Action'
                    )
                    ->color(fn(?string $state): string => match ($state) { // Handle nullable state
                        '0' => 'warning',
                        '1' => 'success',

                    }),



            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make('view')->color('success')->button()->disabled(fn($record) => $record->document->is_deadline)->form(
                    function ($record) {
                        // $user_id = $record->program_chair_id == null ? Faculty::find($record->faculty_id)->first()->user_id : ProgramChair::find($record->program_chair_id)->user_id;
            
                        // dd($user_id);
                        if ($record->is_read != true) {
                            $record->update([
                                'is_read' => true,
                            ]);



                            SendNotification::dispatch($record->user_id);
                            Notification::create([
                                'receiver_id' => $record->user_id,
                                'sender_id' => auth()->user()->id,
                                'details' => auth()->user()->name . ' has received the document you sent. ',
                            ]);
                        }


                        return [
                            ViewField::make('rating')
                                ->view('filament.forms.incoming')
                        ];

                    }
                )
            ])
            ->bulkActions([
                // ...
            ]);
    }


    public function checkAllDocument()
    {
        $today = Carbon::now()->toDateString(); // Get today's date in 'YYYY-MM-DD' format
        $docs = Document::whereDate('deadline', $today)->get(); // Fetch documents with today's deadline
        // $docss = Document::where('is_deadline', true)->whereDate('deadline', '!=', $today)->get();
        // dd($docs);

        // if ($docs->isEmpty()) {
        //    foreach ($docss as $doc) {
        //    $doc->update([
        //     'is_deadline' => false,
        //    ]);
        // }
        // }

        foreach ($docs as $doc) {
            $doc->update([
                'status' => 'due',
            ]);
        }
    }

    public function render()
    {
        $this->checkAllDocument();
        return view('livewire.program-chair.incoming-list');
    }
}
