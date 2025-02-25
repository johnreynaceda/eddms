<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Classification;
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
use Filament\Tables\Filters\SelectFilter;
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
                    Select::make('classification_id')->label('Classification')->options(Classification::all()->pluck('name', 'id'))->required(),
                    TextInput::make('name')->required(),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('CATEGORY')->searchable(),
                TextColumn::make('classification.name')->label('TYPE')->searchable(),

            ])
            ->filters([
                SelectFilter::make('classification_id')->label('Classification')->options(Classification::all()->pluck('name', 'id'))
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    Select::make('classification_id')->label('Classification')->options(Classification::all()->pluck('name', 'id'))->required(),
                    TextInput::make('name')->required(),
                ])->modalWidth('xl'),
                // DeleteAction::make('delete'),
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
