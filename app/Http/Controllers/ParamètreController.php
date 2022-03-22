<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamètreController extends Controller

{
    function __construct()

    {

         $this->middleware('permission:parametre-list', ['only' => ['index']]);

        
    }
    public function index()
    {

        return view('backend.parametre.index');
    }

}
