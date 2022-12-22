<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use App\Models\PersonneAPrevenir;
use App\Models\Carnet_sante;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBeneficiaireRequest;

class BeneficiaireController extends Controller
{
    
    //
     //Fonction pour recuprer la liste des parents(Beneficiaire) enregistré par l'Agent Connecté
    public function listeBeneficiaire(){
        $user = auth()->user()->code_agent;
        $utilisateurs = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,users.telephone,users.created_at,roles.name as role_name
        FROM users,model_has_roles,roles
        WHERE users.id = model_has_roles.model_id
        AND
        model_has_roles.role_id = roles.id 
        AND
        roles.name = 'Utilisateur' AND users.code_agent='$user' ORDER BY users.id DESC");
        return view('backend.beneficiaires.listeBeneficiaire',compact('utilisateurs'));
    }
    //Fonction pour Ajouter Des Parents(Beneficiaire)
    public function addBeneficiaire(CreateBeneficiaireRequest $request){
        //dd($request->all());
        //dd(auth()->user()->code_agent);
        //$input = $request->all();
        //dd($request->all());
        $cs                 = new Carnet_sante();
        $cs->antecedent     = $request->antecedent;
        $cs->sexe           = $request->sexe;
        $cs->poids          = $request->poids;
        $cs->taille         = $request->taille;
        $cs->groupe         = $request->groupe;
        $cs->allergie       = $request->allergie;
        $cs->vaccination    = $request->vaccination;
        $cs->maladie        = $request->maladie;
        $cs->save();
        $cs_id = DB::table('carnet_santes')->latest('id')->first();
        $lc                     = new Location();
        $lc->pays               = $request->pays;
        $lc->region             = $request->region;
        $lc->ville              = $request->ville;
        $lc->village            = $request->village;
        $lc->save();
        $lc_id = DB::table('locations')->latest('id')->first();
            $pap = new PersonneAPrevenir();
            $pap->nom_personne1         = $request->nom_personne1;
            $pap->prenom_personne1      = $request->prenom_personne1;
            $pap->telephone_personne1   = $request->telephone_personne1;
            $pap->nom_personne2         = $request->nom_personne2;
            $pap->prenom_personne2      = $request->prenom_personne2;
            $pap->telephone_personne2   = $request->telephone_personne2;
            $pap->nom_personne3         = $request->nom_personne3;
            $pap->prenom_personne3      = $request->prenom_personne3;
            $pap->telephone_personne3   = $request->telephone_personne3;
            $pap->save();
            $pap_id = DB::table('personne_a_prevenirs')->latest('id')->first();
        $user                   = new User();
        $user->nom              = $request->nom;
        $user->prenoms          = $request->prenoms;
        $user->email            = $request->email;
        $user->telephone        = $request->telephone;
        $user->telephone2       = $request->telephone2;
        $user->date_naissance   = $request->date_naissance;
        $user->genre            = $request->sexe;
        $user->profession       = $request->profession;
        $user->supports         = $request->input('supports');
        $user->carnet_sante_id  = $cs_id->id;
        $user->location_id      = $lc_id->id;
        $user->personne_a_prevenir_id  = $pap_id->id;
        $user->code_agent       = auth()->user()->code_agent;
        $user->save();
        $user->assignRole('Utilisateur');
        return redirect()->route('admin.user.listeBeneficiaire')->with('success', 'Nouveau Parent ajouté avec succès');
    }

    public function edit($id)
    {
        $user = DB::SELECT("SELECT users.nom,users.prenoms,users.profession,users.email,users.telephone,users.telephone2,
        locations.pays,locations.region,locations.ville,locations.village,
        personne_a_prevenirs.nom_personne1,personne_a_prevenirs.prenom_personne1,personne_a_prevenirs.telephone_personne1,
        personne_a_prevenirs.nom_personne2,personne_a_prevenirs.prenom_personne2,personne_a_prevenirs.telephone_personne2,
        personne_a_prevenirs.nom_personne3,personne_a_prevenirs.prenom_personne3,personne_a_prevenirs.telephone_personne3,
        carnet_santes.antecedent,carnet_santes.poids,carnet_santes.taille,carnet_santes.groupe,carnet_santes.vaccination,
        carnet_santes.maladie,carnet_santes.allergie
        FROM users,locations,personne_a_prevenirs,carnet_santes
        WHERE users.location_id = locations.id
        AND users.personne_a_prevenir_id = personne_a_prevenirs.id
        AND users.carnet_sante_id = carnet_santes.id
        AND users.id = $id");
        $user = $user[0];
        return view('backend.beneficiaires.edit',compact('user'));
    }
}
