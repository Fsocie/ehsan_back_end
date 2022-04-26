<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParamètreController extends Controller

{
    function __construct()

    {

        $this->middleware('permission:parametre-list', ['only' => ['index']]);
    }
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

        $transactions =DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->orderBy('transactions.id', 'desc')
            ->get();

        return view('backend.parametre.index', ['messageNotification' => $messageNotification, 'compter' => $compter, 'transactions' => $transactions]);
    }
}
