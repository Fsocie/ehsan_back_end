<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadMessageController extends Controller
{
    public $contacts_id;

    public function mount($contacts_id)
    {
        $this->contacts_id = $contacts_id;
    }

    public function readMessage(){
        $user = Auth::user();
        $message = contacts::find($this->contacts_id);
        $message = contacts::where('id', '=', $this->contacts_id)->get();
        return view('backend.message.read-message', ['message'=>$message, 'user'=>$user]);
    }
}
