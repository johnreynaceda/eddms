<?php

namespace App\Livewire;

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

class AdminDocument extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Document::query()->orderBy('created_at', 'DESC'))
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
               ViewAction::make('view')->color('success')->button()->form([
                        ViewField::make('rating')
            ->view('filament.forms.pdf')
                    ]

                
               )
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin-document');
    }
}
