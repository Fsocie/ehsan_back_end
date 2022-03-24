<?php

namespace App\Http\Controllers;

use App\Models\Has_children;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{



     public function index(){

        $enfant=Has_children::all();

        return view("backend.enfant.index", compact('enfant'));

     }

     public function generate ($id) {

        $enfant=Has_children::find($id);

            $response = [
                'nom' =>  $enfant->nom,
                'prenom' =>  $enfant->prenom,
                'description' =>  $enfant->description,
                'date de naissance' =>  $enfant->date_naissance,
            ];

            $info=json_encode($response);

            $identifiant = $enfant->nom.'+'.$enfant->prenom;
    	$qrcode = QrCode::size(200)->generate($info,'../public/codes-qr/'.$identifiant.'.svg');

           // dd($qrcode );
    	return view("backend.enfant.showCode", compact('qrcode'))->with('success','code Qr générer et enregistrer ');;
    }
}
