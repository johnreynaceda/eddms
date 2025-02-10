<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Document;
use App\Models\Post;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Reports extends Component implements HasForms
{
    use InteractsWithForms;

    public $date_from, $date_to, $type, $status, $deadline;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('FILTER')->schema([
                    DatePicker::make('date_from')->columnSpan(2)->live(),
                    DatePicker::make('date_to')->columnSpan(2)->live(),
                    Select::make('type')->options(Category::all()->mapWithKeys(function($record){
                        return [$record->id => $record->name.'-'.$record->type];
                    }))->columnSpan(2)->live(),
                    Select::make('status')->options([
                        'pending' => 'Pending',
                        'received' => 'Received',
                    ])->live(),
                    DatePicker::make('deadline')->live()

                ])->columns(4),
               
            ]);
    }

    public function render()
    {
        return view('livewire.reports',[
            'documents' => Document::when($this->date_from && $this->date_to, function($query) {
                $query->whereDate('date_of_letter', '>=', $this->date_from)
                      ->whereDate('date_of_letter', '<=', $this->date_to);
            })
            ->when($this->type, function($query) {
                $query->whereHas('category', function($cat) {
                    $cat->where('id', $this->type);
                });
            })
            ->when($this->deadline, function($query) {
                $query->whereDate('deadline', $this->deadline); // Adjust the operator as needed
            })
            ->when($this->status, function($query) {
                $query->where('status', $this->status);
            })
            ->get(),
        ]);
    }

    
}
