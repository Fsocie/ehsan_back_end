<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create',compact('roles'));
    }
    public function store(Request $request,User $user)
    {
        //dd($request->role_id);
        //die();
        //dd($request->nom);
        $data = $request->validate([
            'nom'=>'required|string',
            'prenoms'=>'required|string',
            'telephone'=>'required|string|unique:users',
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        User::create($data);
        $user->assignRole($request->role_id);
        return redirect()->route('users.index')->with('success','Nouveau user ajouté avec succès');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('backend.users.update',compact('user','roles'));
    }

    public function update(Request $request,User $user)
    {
        //dd($request->roles);
        $user->update($request->all());
        $user->syncRoles($request->roles);
        return redirect()->route('users.index')->with('success','user mise a jour avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success','user Supprimée avec succès');
    }
}
