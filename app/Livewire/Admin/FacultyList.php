<?php

namespace App\Livewire\Admin;

use App\Models\Faculty;
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

class FacultyList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Faculty::query())->headerActions([
                CreateAction::make('new')->label('New Faculty')->icon('heroicon-o-plus')->action(
                    function($data){
                        $user = User::create([
                            'name' => $data['firstname']. ' '. $data['lastname'],
                            'email' => $data['email'],
                            'password' => $data['password'],
                            'user_type' => 'staff'
                        ]);

                        Faculty::create([
                            'firstname' => $data['firstname'],
                            'lastname' => $data['lastname'],
                            'middlename' => $data['middlename'],
                            'user_id' => $user->id,
                        ]);
                    }
                )->form([
                    Grid::make(2)->schema([
                        TextInput::make('firstname')->required(),
                        TextInput::make('middlename'),
                        TextInput::make('lastname')->required(),
                    ]),
                    Fieldset::make('ACCOUNT INFO')->schema([
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')->password()->required(),
                    ]),
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('lastname')->label('LASTNAME')->searchable(),
                TextColumn::make('firstname')->label('FIRSTNAME')->searchable(),
                TextColumn::make('user.email')->label('EMAIL')->searchable(),
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
        return view('livewire.admin.faculty-list');
    }
}
