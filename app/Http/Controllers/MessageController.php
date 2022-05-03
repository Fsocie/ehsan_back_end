<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public $contact_id;

    public function mount($contact_id)
    {
        $this->contact_id = $contact_id;
    }

    public function recherche()
    {
        $q = request()->input('q');
        //dump($q);    
        $recherchers = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->where('contacts.audio', 'LIKE', "%$q%")
            ->orWhere('contacts.id', 'LIKE', "%$q%")
            ->orWhere('users.nom', 'LIKE', "%$q%")
            //->orWhereDay('contacts.created_at', 'LIKE', "%$q%")
            //->orWhereMonth('contacts.created_at', 'LIKE', "%$q%")
            ->select('*')
            ->get();

        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        return view('backend.message.recherche', ['recherchers' => $recherchers, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }

    public function notification()
    {
        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();
        return view('backend.message.notification', ['messageNotification' => $messageNotification, 'compter' => $compter]);
    }



    public function message()
    {
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->select('*')
            ->get();

        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();
        return view('backend.message.message', ['message' => $message, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }
}
