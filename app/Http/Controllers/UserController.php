<?php

namespace App\Http\Controllers;


use auth;
use App\Models\User;
use Illuminate\Support\Arr;
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
     * Creer un nouvel utiliateur
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string',
            'prenoms'   => 'required|string',
            'telephone' => 'required|string|unique:users',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',
            'roles'     => 'required',
        ]);
        $input = $request->all();
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
