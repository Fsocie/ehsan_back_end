<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        } elseif (isset($_POST['audio-filename']) && isset($_FILES['audio-blob'])) {

            $contact = contacts::find($contact_id);
            $contact->reponses = $request->file('audio-blob')->storeAs('audio', $_POST['audio-filename'], 'uploads');

            $contact->reponses = $_POST['audio-filename'];
            $contact->save();
            //var_dump($_FILES);
            echo "Votre message a été bien enrégistré 2";
        } else {
            echo " Echec, une erreur s'est produite ";
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
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();
        return view('backend.message.read-message', ['message' => $message, 'compter' => $compter, 'messageNotification' => $messageNotification]);
    }
}
