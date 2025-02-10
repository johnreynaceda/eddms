<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

use WireUi\Traits\WireUiActions;

class UserDropdown extends Component
{
    use WireUiActions;
    public function render()
    {
        return view('livewire.user-dropdown',[
            'notifications' => Notification::where('receiver_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
        ]);
        
    }

    #[On('echo:notifs,SendNotification')]
    public function receivedNotification($id){
        if ($id['user_id'] == auth()->user()->id) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Message',
                'description' => 'Some sent you a notification',
            ]);
        }
        
    }


}
