<?php
namespace App\Livewire\ProgramChair;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DocumentOpen extends Component
{

    public $category_id;
    public $doc_id;
    public $date_filtered;

    public $search_folder;
    public $search;

    public $view_data;

    public $view_modal = false;

    public function mount()
    {
        $this->category_id = request('id');
    }

    public function setDate($id)
    {
        $this->doc_id        = $id;
        $data                = Document::where('id', $this->doc_id)->first();
        $this->date_filtered = Carbon::parse($data->date_of_letter);

    }

    public function updatedDocId()
    {
        $this->search = null;
    }

    public function viewDocument($id)
    {
        $this->view_data  = Document::where('id', $id)->first();
        $this->view_modal = true;
    }

    public function render()
    {

        return view('livewire.program-chair.document-open', [
            'dates'     => Document::where('category_id', $this->category_id)
                ->where('date_of_letter', 'like', '%' . $this->search_folder . '%')
                ->get()
                ->unique('date_of_letter'),
            'documents' => Document::whereDate('date_of_letter', $this->date_filtered)
                ->where(function ($query) {
                    $query->where('document_code', 'like', '%' . $this->search . '%')
                        ->orWhereHas('faculty', function ($faculty) {
                            $faculty->where('lastname', 'like', '%' . $this->search . '%')->orWhere('firstname', 'like', '%' . $this->search . '%');
                        })->orWhereHas('programChair', function ($programChair) {
                        $programChair->where('lastname', 'like', '%' . $this->search . '%')->orWhere('firstname', 'like', '%' . $this->search . '%');
                    });
                })
                ->get(),

        ]);

    }
}
