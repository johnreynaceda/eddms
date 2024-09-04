<?php

namespace App\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class Notifs extends Component
{
    public $openNotif = false;

    public $title = '', $author = '', $content = '';
    public function render()
    {
        return view('livewire.notifs',[
            'announcements' => Announcement::orderBy('created_at', 'DESC')->get()->take(5),
        ]);
    }

    public function openAnnouncement($id){
        $query = Announcement::where('id', $id)->first();
        $this->title = $query->title;
        $this->author = $query->user->user_type;
        $this->content = $query->content;

        $this->openNotif = true;
    }
}
