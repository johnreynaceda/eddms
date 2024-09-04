<?php

namespace App\Livewire\Admin;

use App\Models\Announcement;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AnnouncementList extends Component implements HasForms
{
    use InteractsWithForms;

    public $title, $content;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                MarkdownEditor::make('content'),
            ]);
    }

    public function submitAnnouncement(){
      sleep(1);
      Announcement::create([
        'title' => $this->title,
        'content' => $this->content,
        'user_id' => auth()->user()->id, // Assuming user_id is defined in your User model
      ]);

      $this->reset(['title', 'content']);
    }

    public function render()
    {
        return view('livewire.admin.announcement-list',[
            'announcements' => Announcement::orderBy('created_at', 'DESC')->get()->take(5),
        ]);
    }
}
