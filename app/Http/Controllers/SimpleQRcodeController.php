<?php

namespace App\Http\Controllers;

use App\Models\Has_children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{



    public function index()
    {

        $enfant = HashChild::all();
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(5)
            ->take(4)
            ->select('*')
            ->get();

        return view("backend.enfant.index", compact('enfant', 'message'));
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

        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(5)
            ->take(4)
            ->select('*')
            ->get();


        return view("backend.enfant.showCode", compact('qrcode', 'message'))->with('success', 'code Qr générer et enregistrer ');;
    }
}
