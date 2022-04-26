<?php

namespace App\Http\Controllers;

use App\Models\Carnet_sante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarnetController extends Controller
{
    public function index()
    {

        $carnet = Carnet_sante::all();
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
        return view('backend.carnet.index', ['carnet' => $carnet, 'messageNotification' => $messageNotification, 'compter'=>$compter]);
    }

    public function show($id)
    {

        $carnet = Carnet_sante::find($id);
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
        return view('backend.carnet.show', ['carnet' => $carnet, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }
}
