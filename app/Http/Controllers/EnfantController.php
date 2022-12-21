<?php

namespace App\Http\Controllers;
use App\Models\Has_children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnfantController extends Controller
{
    //
    //Formulaire pour ajouter un Enfant && recuperation des parents ajouté par l'agent connecté
    public function formulaireAjoutEnfant(){
        $user = auth()->user()->code_agent;
        $utilisateurs = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
        FROM users,model_has_roles,roles
        WHERE users.id = model_has_roles.model_id
        AND
        model_has_roles.role_id = roles.id 
        AND
        roles.name = 'Utilisateur' AND users.code_agent = '$user' ORDER BY users.id DESC limit 5");

        return view('backend.enfant.formulaireAjoutEnfant',compact("utilisateurs"));
    }
    //Ajouté un enfant par l'Agent de terrain connecté
    public function addEnfant(Request $request){
        $message = [
            'nom.required'                  =>'Veuillez entrer le nom !!!',
            'nom.string'                    =>'Veuillez entrer une chaine de caractère !!!',
            'prenom.required'               =>'Veuillez entrer le prenom !!!',
            'prenom.string'                 =>'Veuillez entrer une chaine de caractère !!!',
            'date_naissance.required'       =>'Veuillez entrer votre taille !!!',
            'date_naissance.string'         =>'Veuillez entrer une date !!!',
            'description.required'          =>'Veuillez entrer une description !!!',
            'description.string'            =>'Veuillez choisir une chaine de caractère !!!',
            'photo.required'                =>'Veuillez choisir une image de votre enfant',
            'photo.file'                    =>'Veuillez choisir un fichier image',
            'photo.mimes'                   =>'L\'extension de votre image n\'est pas autorisé',
            'photo.max'                     =>'La taille de votre image n\'est pas autorisé',
        ];
        $request->validate([
            'nom'               =>'required|string',
            'prenom'            =>'required|string',
            'date_naissance'    =>'required|string',
            'description'       =>'required|string',
            'photo'             =>'required|file|mimes:jpg,png,jpeg|max:1024',
            'user_id'           =>'required|integer'
        ],$message);
        $filename = time().'.'.$request->photo->extension();
        $img = $request->file('photo')->storeAs('EnfantsImage',$filename,'public');
        $child = new Has_children();
        $child->nom             = $request->nom;
        $child->prenom          = $request->prenom;
        $child->date_naissance  = $request->date_naissance;
        $child->description     = $request->description;
        $child->user_id         = $request->user_id;
        $child->code_agent      = auth()->user()->code_agent;
        $child->photo           = $img;
        $child->save();
        return redirect()->route('admin.users.listeEnfant')->with('success','Enfant ajouté avec success');
    }
    //Liste des Enfants Enregistrer pas l'Agent de terrain actuellement conneté
    public function listeEnfants(){
        $user = auth()->user()->code_agent;
        $enfants = DB::SELECT("SELECT has_childrens.id,has_childrens.nom,
        has_childrens.prenom,has_childrens.created_at,
        has_childrens.date_naissance,users.nom as nom_parent,users.prenoms as prenom_parent from has_childrens,users
        WHERE has_childrens.user_id = users.id AND has_childrens.code_agent = '$user' ORDER BY has_childrens.id DESC");
        return view('backend.enfant.listeEnfants',compact('enfants'));
    }
}
