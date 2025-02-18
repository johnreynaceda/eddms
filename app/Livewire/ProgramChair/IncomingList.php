<?php

namespace App\Livewire\ProgramChair;

use App\Events\SendNotification;
use App\Models\Category;
use App\Models\Document;
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
            ->query(Document::query()->where(function ($query) {

                $faculty = Faculty::where('user_id', auth()->user()->id)->first();

                if (auth()->user()->user_type === 'program_chair') {
                    // Find the program chair record
                    $programChair = ProgramChair::where('user_id', auth()->user()->id)->first();


                    if ($programChair) {
                        // Filter by the program_id if a ProgramChair is found
                        $query->where('program_chair_id', $programChair->id);
                    }
                }else{
                    $query->where('faculty_id', $faculty->id);
                }
                // No additional filtering for other user types
            })->orderBy('created_at', 'DESC'))
            ->columns([
                TextColumn::make('document_code')->label('DOCUMENT CODE')->icon('heroicon-o-document-text')->iconColor('success')->searchable(),
                ViewColumn::make('id')->label('RECIPIENT')->view('filament.tables.recipient'),
                ViewColumn::make('details')->label('DETAILS')->view('filament.tables.details'),

                TextColumn::make('date_of_letter')->date()->label('DATE OF LETTER')->searchable(),
                TextColumn::make('deadline')->date()->label('DEADLINE')->searchable(),
               
                TextColumn::make('status')
                ->label('STATUS')
                ->searchable()
                ->badge()
                ->color(fn (?string $state): string => match ($state) { // Handle nullable state
                    'pending' => 'warning',
                    'received' => 'success',
                    'due' => 'danger',
                    'rejected' => 'danger',
                    default => 'secondary'
                }),
                // TextColumn::make('is_deadline')
                // ->label('IS DEADLINE')
                // ->badge()
                // ->formatStateUsing(fn ($state) => $state ? 'deadline' : 'not due') // Ensure proper transformation
                // ->color(fn ($state) => $state ? 'danger' : 'secondary') // Use raw state for color
                // ->visible(fn ($record) => isset($record->is_deadline)),
                TextColumn::make('date_of_letter')->date()->label('DATE OF LETTER')->searchable(),


                ])
            ->filters([
                // ...
            ])
            ->actions([
               ViewAction::make('view')->color('success')->button()->disabled(fn($record) => $record->is_deadline)->form(
                function($record){
                    $user_id = $record->program_chair_id == null ? Faculty::find($record->faculty_id)->first()->user_id : ProgramChair::find($record->program_chair_id)->user_id;

                    // dd($user_id);
                   if ($record->status != 'received') {
                    $record->update([
                        'status' => 'received',
                    ]);

                   

                    SendNotification::dispatch($record->user_id);
                    Notification::create([
                        'receiver_id' => $record->user_id,
                        'sender_id' => auth()->user()->id,
                        'details' => auth()->user()->name. ' has received the document you sent. ',
                    ]);
                   }


                    return [
                        ViewField::make('rating')
            ->view('filament.forms.pdf')
                    ];

                }
               )
            ])
            ->bulkActions([
                // ...
            ]);
    }


    public function checkAllDocument(){
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
