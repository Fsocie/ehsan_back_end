<?php

namespace App\Http\Controllers;

use App\Models\Carnet_sante;
use App\Models\User;
use Illuminate\Http\Request;

class CarnetController extends Controller
{
    public function index() {

        $carnet=Carnet_sante::all();
        return view('backend.carnet.index',['carnet' => $carnet]);
    }

    public function show($id) {

        $carnet=Carnet_sante::find($id);
        return view('backend.carnet.show',['carnet' => $carnet]);
    }
}
