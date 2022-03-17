<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComposeController extends Controller
{
    public function composePost(Request $request)
    {
        // $query = User::pluck(['nom']);
        // $request = $_POST['messageValue'];

        // foreach ($query as $nom) {
        //     //if(User::where('nom' ,'LIKE', '%'.$request.'%')){
        //     if ($nom = $request) {

        //         echo "Prénoms";
        //     } else {
        //         echo "Réponse non disponible";
        //     }
        // }

        $nom = User::find(Auth::user()->id);
        if ($nom->nom == $_POST['messageValue']) {
            echo $nom->prenoms;
        } else {
            echo "Réponse non disponible";
        }
    }


    public function compose()
    {
        return view('backend.message.compose');
    }
}
