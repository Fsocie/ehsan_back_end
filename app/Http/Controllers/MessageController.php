<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public $contacts;

    public function mount($contacts)
    {
        $this->contacts = $contacts;
    }

    public function message(){
        $user = Auth::user();
        $message = contacts::where('user_id', '=', $user->id)->get();    
        return view('backend.message.message', ['message'=>$message, 'user'=>$user]);
    }
}
