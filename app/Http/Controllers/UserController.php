<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Arr;
use App\Models\Carnet_sante;
use App\Models\Has_children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store','addUser']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    //Liste des Agents
    public function listeAgent(){
        $agents = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
            FROM users,model_has_roles,roles
            WHERE users.id = model_has_roles.model_id
            AND
            model_has_roles.role_id = roles.id 
            AND
            roles.name = 'Agent'");
        return view('backend.users.agents',compact('agents'));
    }
    //Liste des Utilisateurs
    public function listeUtilisteurs(){
        $utilisateurs = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
            FROM users,model_has_roles,roles
            WHERE users.id = model_has_roles.model_id
            AND
            model_has_roles.role_id = roles.id 
            AND
            roles.name = 'Utilisateur'");
        return view('backend.users.utilisateurs',compact('utilisateurs'));
    }
     //Liste des Enfants Enregistrer pas l'Agent de terrain actuellement conneté
    public function listeEnfants(){
        $user = auth()->user()->code_agent;
        $enfants = DB::SELECT("SELECT has_childrens.id,has_childrens.nom,
        has_childrens.prenom,
        has_childrens.date_naissance,users.nom as nom_parent,users.prenoms as prenom_parent from has_childrens,users
        WHERE has_childrens.user_id = users.id AND has_childrens.code_agent = '$user'");
        return view('backend.users.listeEnfants',compact('enfants'));
    }
    //Liste des administrateurs
    public function index(Request $request)

    {

        $users = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
            FROM users,model_has_roles,roles
            WHERE users.id = model_has_roles.model_id
            AND
            model_has_roles.role_id = roles.id
            AND
            roles.name = 'Admin'");

        return view('backend.users.index', compact('users'));


    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::all();
        /*$messageNotification = DB::table('users')
        ->join('contacts', 'users.id', '=', 'contacts.user_id')
        ->take(4)
        ->select('*')
        ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();*/


        return view('backend.users.create', compact('roles'));
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'name'      => 'required',
            'nom'       => 'required|string',
            'prenoms'   => 'required|string',
            'telephone' => 'required|string|unique:users',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',
            'roles'     => 'required'
        ]);
        dd($data);
        $input = $request->all();
        dd($input);
        $input['password'] = Hash::make($input['password']);
        $input['is_admin'] = 1;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function createUser(Request $request){
        $request->validate([
            'nom'       => 'required|string',
            'prenoms'   => 'required|string',
            'telephone' => 'required|string|unique:users',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',
            'roles'     => 'required',
        ]);
        $input = $request->all();
        //dd($request->roles[0]);
        //dd($input);
        $u              = new User();
        $u->nom         = $request->nom;
        $u->prenoms     = $request->prenoms;
        $u->telephone   = $request->telephone;
        $u->email       = $request->email;
        $u->password    = Hash::make($request->password);
        $input['is_admin'] = 1;
        if($request->roles[0]=="2"){ 
            $u->code_agent = $input['nom'].'-'.$input['prenoms'].'+'.$input['telephone'].'='.$input['email'].time();
        }
        //$user = User::create($input);
        $u->save();
        $u->assignRole($request->input('roles'));
        if($request->roles[0]=="1"){
            return redirect()->route('users.index')->with('success', 'Nouvelle Administrateur ajouté avec succès');
        }elseif($request->roles[0]=="2"){
            return redirect()->route('agents.liste')->with('success', 'Nouvelle Agent ajouté avec succès');
        }elseif($request->roles[0]=="3"){
            return redirect()->route('utilisateurs.liste')->with('success', 'Nouvelle Utilisateur ajouté avec succès');
        }else{
            return redirect()->route('users.index')->with('success', 'Nouvelle utilisateur ajouté avec succès');
        }
        
    }
    public function listeBeneficiaire(){
        $utilisateurs = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
        FROM users,model_has_roles,roles
        WHERE users.id = model_has_roles.model_id
        AND
        model_has_roles.role_id = roles.id 
        AND
        roles.name = 'Utilisateur' ORDER BY users.id DESC");
        return view('backend.users.listeBeneficiaire',compact('utilisateurs'));
    }
    public function addBeneficiaire(Request $request){
        //dd(auth()->user()->code_agent);
        $message = [
            'nom.required'          => 'Veuillez saisir le nom du bénéficiaire',
            'prenoms.required'      => 'Veuillez saisir le prenom du bénéficiaire',
            'telephone.required'    => 'Veuillez saisir le telephone du bénéficiaire',

            'antecedent.required'   => 'Veuillez saisir l\'antecedent du bénéficiaire',
            'sexe.required'         => 'Veuillez choisir le genre du bénéficiaire',
            'sexe.min'              => 'Genre trop court',
            'sexe.max'              => 'Genre trop long',
            'poids.required'        => 'Veuillez saisir le poids du bénéficiaire',
            'poids.min'             => 'Poids trop petit',
            'poids.max'             => 'Genre trop grand',
            'taille.required'       => 'Veuillez saisir la taille du bénéficiaire',
            'taille.min'            => 'Taille trop petit',
            'taille.max'            => 'Taille trop grand',
            'groupe.required'       => 'Veuillez saisir le groupe sanguin du bénéficiaire',
            'vaccination.required'  => 'Veuillez saisir la vaccination du bénéficiaire',
            'allergie.required'     => 'Veuillez saisir l\'allergie du bénéficiaire',
            'maladie.required'      => 'Veuillez saisir la maladie du bénéficiaire',
        ];
        $request->validate([
            'nom'       => 'required|string|min:2|max:20',
            'prenoms'   => 'required|string|min:2|max:50',
            'telephone' => 'required|string|unique:users',
            //'email'     => 'required|email|unique:users,email',
            'antecedent'    =>'required|string|min:2|max:20',
            'sexe'          =>'required|string|min:1|max:1',
            'poids'         =>'required|numeric|min:2|max:200',
            'taille'        =>'required|numeric|min:2|max:210',
            'groupe'        =>'required|string|min:2|max:20',
            'vaccination'   =>'required|string|min:2|max:20',
            'allergie'      =>'required|string|min:2|max:20',
            'maladie'       =>'required|string|min:2|max:20'
        ],$message);
        $input = $request->all();
        //dd($request->all());
        $cs = new Carnet_sante();
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
        $user                   = new User();
        $user->nom              = $request->nom;
        $user->prenoms          = $request->prenoms;
        $user->email            = $request->email;
        $user->telephone        = $request->telephone;
        $user->carnet_sante_id  = $cs_id->id;
        //$user->code_agent = auth()->user()->code_agent;
        $user->save();
        $user->assignRole('Utilisateur');
        return redirect()->route('admin.user.listeBeneficiaire')->with('success', 'Nouveau Bénéficiaire ajouté avec succès');
    }
    public function formulaireAjoutEnfant(){
        $utilisateurs = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
        FROM users,model_has_roles,roles
        WHERE users.id = model_has_roles.model_id
        AND
        model_has_roles.role_id = roles.id 
        AND
        roles.name = 'Utilisateur' ORDER BY users.id DESC limit 5");

        return view('backend.users.formulaireAjoutEnfant',compact("utilisateurs"));
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



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->select('*')
            ->get();

        return view('backend.users.show', compact('user', 'message', 'compter'));
    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);

        $roles = Role::pluck('name', 'name')->all();

        $userRole = $user->roles->pluck('name', 'name')->all();
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->select('*')
            ->get();

        return view('backend.users.update', compact('user', 'roles', 'userRole', 'message', 'compter'));
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);



        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);
        } else {

            $input = Arr::except($input, array('password'));
        }



        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();



        $user->assignRole($request->input('roles'));



        return redirect()->route('users.index')

            ->with('success',  "L'utilisateur a été mise à jour avec succès !!!");
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')

            ->with('success', "L'utilisateur a été supprimé avec succès !!!");
    }


    public function ProfileUtilisateur($id){
        $users = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.telephone,users.email,users.montant,users.profession,
        carnet_santes.antecedent,carnet_santes.sexe,carnet_santes.poids,carnet_santes.taille,carnet_santes.groupe,
        carnet_santes.allergie,carnet_santes.vaccination,carnet_santes.maladie,carnet_santes.created_at
        FROM users,carnet_santes 
        WHERE users.carnet_sante_id = carnet_santes.id and users.id = $id");
        $users = $users[0];
        //dd($users);
        return view("backend.users.profile",compact('id','users'));
    }
}
