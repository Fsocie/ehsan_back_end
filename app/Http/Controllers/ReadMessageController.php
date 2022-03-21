<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadMessageController extends Controller
{
    public function mount($contact_id)
    {
        $contact = contacts::find($contact_id);
        $contact->audio = $this->audio;
        $contact->user_id = $this->user_id;
        $contact->lu = $this->lu;
    }

    public function updateLu($contact_id)
    {
        
    }

    public function readMessage($contact_id){
        
        $contact = contacts::find($contact_id);
        $contact->lu = 1;
        $contact->save();

        $user = Auth::user();
        $message = contacts::where('user_id',$user->id)->where('id',$contact_id)->get();
        //dump($contact_id);
        return view('backend.message.read-message', ['message'=>$message, 'user'=>$user]);
    }
}
