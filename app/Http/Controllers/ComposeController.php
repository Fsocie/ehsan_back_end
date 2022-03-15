<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ComposeController extends Controller
{
    public function composePost(Request $request)
    {
        $request->all();
        if(User::where('nom' ,'LIKE', '%'.$request.'%')){
            echo "prenoms";
        }else{
            echo "bla";
        }
    }
    
    
    public function compose()
    {
        return view('backend.message.compose');
    }
}
