<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Has_children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{



    /*public function test()
    {
        $enfant = Has_children::all();
        return view("backend.enfant.joi", compact('enfant'));
    }*/
    //Liste des enfants
    public function TestCodeQrFunc() {
        $enfant = Has_children::all();
        return view("backend.enfant.enfant", compact('enfant'));
    }
    //Gnerer un Code Qr pour les enfant
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
        /********************************************************************/
            $path = public_path('/qr-codes/enfants/');
            if(!File::exists(($path))) {
                File::makeDirectory($path, 0777, true);
            }
            $file_path = $path . time() . '.png';
            $qrcode = QrCode::size(200)->generate($info,$path.$identifiant.'.svg',$file_path);
        /********************************************************************/
    	return view("backend.enfant.showCode", compact('qrcode','enfant'))->with('success','code Qr générer et enregistrer ');
    }

    public function parentQrCodeGenerate($id){
        //$parent = User::find($id);
        $parent = DB::SELECT("SELECT 
        users.nom,users.prenoms,users.telephone,users.telephone2,users.email,users.date_naissance,users.genre,users.montant,users.profession,
        locations.ville,locations.village,
        carnet_santes.antecedent,carnet_santes.groupe,carnet_santes.allergie,carnet_santes.vaccination,carnet_santes.maladie
        FROM users,locations,carnet_santes
        WHERE users.location_id = locations.id
        AND users.carnet_sante_id = carnet_santes.id
        AND users.id = $id");
        $parent = $parent[0];
        $response = [
            'nom'               =>  $parent->nom,
            'prenoms'           =>  $parent->prenoms,
            'telephone'         =>  $parent->telephone,
            'telephone2'        =>  $parent->telephone2,
            'email'             =>  $parent->email,
            'date_naissance'    =>  $parent->date_naissance,
            'genre'             =>  $parent->genre,
            'montant'           =>  $parent->montant,
            'profession'        =>  $parent->profession,
            'ville'             =>  $parent->ville,
            'village'           =>  $parent->village,
            'antecedent'        =>  $parent->antecedent,
            'groupe'            =>  $parent->groupe,
            'allergie'          =>  $parent->allergie,
            'vaccination'       =>  $parent->vaccination,
            'maladie'           =>  $parent->maladie,
        ];
        $info = json_encode($response);
        //Methode de nommage du fichier img du CodeQr.
        /*$firstCharacter =strtoupper(substr($parent->nom, 0, 3));
        $secondCharacter =strtoupper(substr($parent->prenoms, 0, 3));*/
        $firstCharacter =strtoupper($parent->nom);
        $secondCharacter =strtoupper($parent->prenoms);
        $identifiant = $firstCharacter .'-'.$secondCharacter.$parent->telephone;
        //$qrcode = QrCode::size(200)->generate($info, '../public/codes-qr/' . $identifiant . '.svg');
        /********************************************************************/
        $data = new User();
            $path = public_path('/qr-codes/parents/');
            if(!File::exists(($path))) {
                File::makeDirectory($path, 0777, true);
            }
            $file_path = "qr-codes/parents/".$identifiant.'.svg';
            $qrcode = QrCode::size(200)->generate($info,$file_path);
        /********************************************************************/
        /*if(Storage::disk('public')->exists($request->image)){
            //'si image existe on le supprime ensuite on fait la mise à jour';
            Storage::disk('public')->delete($request->image);
        }else{
            
        }*/
        DB::SELECT("UPDATE users SET profile_photo_path= '$file_path' WHERE id=$id");
        $img_qrcode = DB::SELECT("SELECT profile_photo_path FROM users WHERE id=$id");
        $img_qrcode = $img_qrcode[0]->profile_photo_path;
        /********************************************************************/
        //dd($qrcode);
        return view("backend.users.showParentQrCode", compact('qrcode','parent','img_qrcode'))->with('success','Code Qr générer et enregistrer ');
    }
}
