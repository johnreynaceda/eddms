<?php

namespace App\Livewire\Admin;

use App\Models\Document;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
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

class OutgoingRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Document::query()->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC'))
            ->columns([
                TextColumn::make('document_code')->label('DOCUMENT CODE')->icon('heroicon-o-document-text')->iconColor('success')->searchable(),
                ViewColumn::make('id')->label('SENDER')->view('filament.tables.recipient')->searchable(query: function ($query, $search) {
                    return $query->whereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
                }),
                ViewColumn::make('details')->label('DETAILS')->view('filament.tables.details')->searchable(query: function ($query, $search) {
                    return $query->whereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                            ->orWhereHas('classification', function ($q) use ($search) {
                                $q->where('name', 'like', "%{$search}%");
                            });
                    });
                }),

                TextColumn::make('date_of_letter')->date('m-d-Y')->label('DATE OF LETTER')->searchable('date_of_letter'),
                TextColumn::make('status')->formatStateUsing(
                    fn(?string $state): string => match ($state) {
                        'pending' => 'Awaiting Action',
                        'received' => 'Received',
                        'rejected' => 'Rejected',
                        'due' => 'Due',
                    }
                )->label('STATUS')->searchable()->badge()->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'received' => 'success',
                        'rejected' => 'danger',
                        'due' => 'danger',
                    }),


            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')->slideOver()->form([
                    ViewField::make('rating')
                        ->view('filament.forms.pdf')
                ])
            ])
            ->bulkActions([
                // ...
            ])->emptyStateHeading('No outgoing documents yet!')->emptyStateDescription('Once you write your document, it will appear here.');
    }

    public function render()
    {
        return view('livewire.admin.outgoing-record');
    }
}
