<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\User;
use App\Notifications\message;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReadMessageController extends Controller
{
    public function mount($contact_id)
    {
        $contact = contacts::find($contact_id);
        $contact->audio = $this->audio;
        $contact->user_id = $this->user_id;
        $contact->lu = $this->lu;
    }

    // public function audioT(Request $request)
    // {
    // $filePath = public_path() . '/admin/dist/audio/' . $request->file . '.' . $request->extension;

    // try {
    //     $file = file_exists($filePath);
    // } catch (FileNotFoundException $e) {
    //     return redirect()->back()->withErrors(["Le fichier n'existe pas"])->withInput();
    // }
    // return response()->file($filePath);
    //}

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
