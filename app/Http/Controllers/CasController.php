<?php

namespace App\Http\Controllers;

use App\Models\Geolocalisation;
use App\Models\HashChild;
use Illuminate\Support\Facades\DB;

class CasController extends Controller
{
    
    public function index()
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

        $signal = Geolocalisation::all();
        return view('backend.signal.index', ['signal' => $signal, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }

    public function show($id)
    {


        $signal = Geolocalisation::find($id);

        $all = Geolocalisation::all();
        $child = HashChild::where("user_id", $signal->user->id)->get();

        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        return view('backend.signal.show', ['signal' => $signal, 'all' => $all, 'child' => $child, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }
}
