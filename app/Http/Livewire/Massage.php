<?php

namespace App\Http\Livewire;

use \App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Massage extends Component
{
    public $message;
    public $users;
    public $clicked_user;
    public $messages;
    public $admin;

    public function render()
    {

        return view('livewire.massage', [
            'users' => $this->users,
            'admin' => $this->admin
        ]);
    }

    public function mount() {
        if (auth()->user()->role_id == 3) {
            $this->messages = \App\Models\Message::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->orderBy('id', 'DESC')->get();
        } else {
            $this->messages = \App\Models\Message::where('user_id', $this->clicked_user)->orWhere('receiver', $this->clicked_user)->orderBy('id', 'DESC')->get();
        }
        $this->admin = \App\Models\User::where('role_id', true)->first();
    }

    public function SendMessage() {
        $new_message = new \App\Models\Message();
        $new_message->message = $this->message;
        $new_message->user_id = auth()->id();
        if (!auth()->user()->role_id == true) {
            $admin = User::where('role_id', true)->first();
            $this->user_id = $admin->id;
        } else {
            $this->user_id = $this->clicked_user->id;
        }
        $new_message->receiver = $this->user_id;
        $new_message->save();
    }

    public function getUser($user_id) {
        $this->clicked_user = User::find($user_id);
        $this->messages = \App\Models\Message::where('user_id', $user_id)->get();
    }
    

}
