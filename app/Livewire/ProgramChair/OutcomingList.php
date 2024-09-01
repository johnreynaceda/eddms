<?php

namespace App\Livewire\ProgramChair;

use App\Models\Category;
use App\Models\Document;
use App\Models\Program;
use App\Models\ProgramChair;
use App\Models\Shop\Product;
use App\Models\User;
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

class OutcomingList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Document::query()->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC'))
            ->columns([
                TextColumn::make('document_code')->label('DOCUMENT CODE')->icon('heroicon-o-document-text')->iconColor('success')->searchable(),
                ViewColumn::make('id')->label('RECIPIENT')->view('filament.tables.recipient'),
                ViewColumn::make('details')->label('DETAILS')->view('filament.tables.details'),

                TextColumn::make('date_of_letter')->date()->label('DATE OF LETTER')->searchable(),
                TextColumn::make('status')->label('STATUS')->searchable()->badge()->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'received' => 'success',
                    'rejected' => 'danger',
                }),


                ])
            ->filters([
                // ...
            ])
            ->actions([
               ViewAction::make('view')->color('success')->button()->form([
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
        return view('livewire.program-chair.outcoming-list');
    }
}
