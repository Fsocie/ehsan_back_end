<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geolocalisation;
use App\Models\HashChild;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CasController extends Controller
{
    public $message;
    public function index()
    {

        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();

        $signal = Geolocalisation::all();
        return view('backend.signal.index', ['signal' => $signal, 'message'=>$message]);
    }

    public function show($id)
    {


        $signal = Geolocalisation::find($id);

        $all = Geolocalisation::all();
        $child = HashChild::where("user_id", $signal->user->id)->get();

        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();

        return view('backend.signal.show', ['signal' => $signal, 'all' => $all, 'child' => $child, 'message' => $message]);
    }
}
