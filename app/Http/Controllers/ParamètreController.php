<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamètreController extends Controller
{
    public function index()
    {

        return view('backend.parametre.index');
    }

}
