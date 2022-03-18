<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    //
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index',compact('roles'));
    }

    public function create()
    {
        return view('backend.roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
        ]);
        Role::create($data);
        return redirect()->route('roles.index')->with('success','Nouveau role ajouté avec succès');
    }

    public function edit(Role $role)
    {
        return view('backend.roles.update',compact('role'));
    }

    public function update(Request $request,Role $role)
    {
        $data = $request->validate([
            'name'=>'required|string'
        ]);
            $role->name = $request->name;
            $role->update();
    
        return redirect()->route('roles.index')->with('success','role mise a jour avec succès');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success','role Supprimée avec succès');
    }

    public function assignPermissionView(Role $role){
        $permissions = Permission::all();
        return view('backend.roles.assignPermission',compact('role','permissions'));
    }

    public function assignPermission(Request $request,Role $role){
        //dd($request->all());
        $role->syncPermissions($request->permission);
        //$permissions = Permission::all();
        return redirect()->back()->with('success','Permission assignée avec succès');
    }
}
