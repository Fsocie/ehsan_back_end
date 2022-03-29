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
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(5)
            ->take(4)
            ->select('*')
            ->get();

        return view('backend.parametre.index', ['message' => $message]);
    }
}
