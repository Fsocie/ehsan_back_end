<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geolocalisation;
use App\Models\HashChild;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CasController extends Controller
{
    
    public function index()
    {

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

        return view('backend.signal.show', ['signal' => $signal, 'all' => $all, 'child' => $child, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }
}
