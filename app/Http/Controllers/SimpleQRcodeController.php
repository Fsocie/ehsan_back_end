<?php

namespace App\Http\Controllers;

use App\Models\HashChild;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{



     public function index(){

        $enfant=HashChild::all();

        return view("backend.enfant.index", compact('enfant'));

     }

     public function generate ($id) {



         $enfant=HashChild::find($id);

            $response = [
                'nom' =>  $enfant->nom,
                'prenom' =>  $enfant->prenom,
                'description' =>  $enfant->description,
                'date de naissance' =>  $enfant->date_naissance,
            ];

            $info=json_encode($response);


    	$qrcode = QrCode::size(200)->generate($info,'../public/codes-qr/'.$enfant->prenom.'.svg');


    	return view("backend.enfant.showCode", compact('qrcode'))->with('success','code Qr générer et enregistrer ');;
    }
}
