<?php

namespace App\Http\Controllers;

use App\Models\Has_children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{



    /*public function test()
    {
        $enfant = Has_children::all();
        return view("backend.enfant.joi", compact('enfant'));
    }*/
    public function TestCodeQrFunc() {
        $enfant = Has_children::all();
        return view("backend.enfant.enfant", compact('enfant'));
    }

    public function generate($id)
    {

        $enfant = Has_children::find($id);

        $response = [
            'nom' =>  $enfant->nom,
            'prenom' =>  $enfant->prenom,
            'description' =>  $enfant->description,
            'date de naissance' =>  $enfant->date_naissance,
        ];

        $info = json_encode($response);

        $identifiant = $enfant->nom . '+' . $enfant->prenom;
        $qrcode = QrCode::size(200)->generate($info, '../public/codes-qr/' . $identifiant . '.svg');

        $qrcode = QrCode::size(200)->generate($info, '../public/codes-qr/' . $enfant->prenom . '.svg');

        $info=json_encode($response);

        $identifiant = $enfant->nom.'+'.$enfant->prenom;
    	$qrcode = QrCode::size(200)->generate($info,'../public/codes-qr/'.$identifiant.'.svg');

           // dd($qrcode );
    	return view("backend.enfant.showCode", compact('qrcode','enfant'))->with('success','code Qr générer et enregistrer ');;



    }
}
