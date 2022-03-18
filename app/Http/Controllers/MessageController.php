<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public $contact_id;

    public function mount($contact_id)
    {
        $this->contact_id = $contact_id;
    }


    public function message(){
        $user = Auth::user();
        $message = contacts::orderBy('created_at','DESC')->where('user_id',$user->id)->get();
        return view('backend.message.message', ['message'=>$message, 'user'=>$user]);
    }
}
