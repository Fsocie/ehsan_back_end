<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReadMessageController extends Controller
{
    public $contact_id;
    public $newreponses;
    public function mount($contact_id)
    {
        $contact = contacts::find($contact_id);
        $contact->audio = $this->audio;
        $contact->user_id = $this->user_id;
        $contact->reponses = $this->reponses;
        $contact->lu = $this->lu;
    }

    public function postMessage($contact_id, Request $request)
    {
        if (isset($_POST['messageValue'])) {
            DB::table('contacts')
                ->where('id', $contact_id)
                ->update(['reponses' => $_POST['messageValue']]);
            echo "Votre message a été bien enrégistré 1";
            //dump($_POST['messageValue'], $contact_id);
        } elseif (isset($_POST['audio-filename'])) {
            $contact = contacts::find($contact_id);
            
            $contact->reponses = $_POST['audio-filename'];
            $contact->save();
            echo "Votre message a été bien enrégistré 2";
        } else {
            echo "Echec";
        }
    }


    public function readMessage($contact_id)
    {

        $contact = contacts::find($contact_id);
        $contact->lu = 1;
        $contact->save();

        $message = DB::table('contacts')->where('contacts.id', $contact_id)
            ->join('users', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(5)
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->select('*')
            ->get();
        return view('backend.message.read-message', ['message' => $message, 'compter' => $compter, 'messageNotification' => $messageNotification]);
    }
}
