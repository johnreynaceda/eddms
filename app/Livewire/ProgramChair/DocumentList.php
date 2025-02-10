<?php

namespace App\Livewire\ProgramChair;

use App\Models\Category;
use Livewire\Component;

class DocumentList extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.program-chair.document-list',[
            'categories' => Category::where('name', 'like', '%'. $this->search . '%')->orWhere('type', 'like', '%'. $this->search . '%')->get(),
        ]);
    }
}
