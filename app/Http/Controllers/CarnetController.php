<?php

namespace App\Http\Controllers;

use App\Models\Carnet_sante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarnetController extends Controller
{
    public function index() {

        $carnet=Carnet_sante::all();
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();
        return view('backend.carnet.index',['carnet' => $carnet, 'message'=>$message]);
    }

    public function show($id) {

        $carnet=Carnet_sante::find($id);
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();
        return view('backend.carnet.show',['carnet' => $carnet,'message'=>$message]);
    }
}
