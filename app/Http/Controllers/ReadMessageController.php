<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadMessageController extends Controller
{
    
    public function updateLu($contact_id)
    {
        $contacts = contacts::find($contact_id);
        $contacts->lu = 1;
        $contacts->save();
    }

    public function readMessage($contact_id){
        $user = Auth::user();
        $message = contacts::where('user_id',$user->id)->where('id',$contact_id)->get();
        //dump($contact_id);
        return view('backend.message.read-message', ['message'=>$message, 'user'=>$user]);
    }
}
