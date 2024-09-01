<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Program;
use App\Models\ProgramChair;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CategoryList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Category::query())->headerActions([
                CreateAction::make('new')->label('New Category')->icon('heroicon-o-plus')->form([
                    Select::make('name')->label('CATEGORY')->options([
                        'Letter' => 'Letter',
                        'Memorandom' => 'Memorandom',
                    ])->required(),
                    TextInput::make('type')->required(),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('CATEGORY')->searchable(),
                TextColumn::make('type')->label('TYPE')->searchable(),

            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.category-list');
    }
}
