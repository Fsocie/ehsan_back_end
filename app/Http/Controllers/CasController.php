<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geolocalisation;
use App\Models\HashChild;
use Illuminate\Support\Facades\Auth;

class CasController extends Controller
{
    public function index() {

        $signal=Geolocalisation::all();
        return view('backend.signal.index',['signal' => $signal]);
    }

    public function show($id) {


        $signal= Geolocalisation::find($id);

        $all=Geolocalisation::all();
       $child=HashChild::where("user_id",$signal->user->id)->get();
     return view('backend.signal.show',['signal' => $signal,'all' => $all,'child' => $child]);

    }

}
