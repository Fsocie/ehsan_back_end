<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComposeController extends Controller
{
    public function composePost(Request $request)
    {
        if ( (isset($_POST['messageValue']))  ){
            echo "oui";
            }
            else{
            echo "non";
            }

        $nom = User::find(Auth::user()->id);
        if ($nom->nom == $_POST['messageValue']) {
            echo $nom->prenoms;
        } else {
            echo "Réponse non disponible";
        }
    }


    public function compose()
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
        return view('backend.message.compose',compact('messageNotification','compter'));
    }
}
