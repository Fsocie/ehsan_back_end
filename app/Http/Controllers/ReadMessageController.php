<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadMessageController extends Controller
{
    public function readmessage(){
        return view('backend.message.read-message');
    }
}
