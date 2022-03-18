<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    //
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permissions.index',compact('permissions'));
    }
    public function create()
    {
        return view('backend.permissions.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
        ]);
        Permission::create($data);
        return redirect()->route('permissions.index')->with('success','Nouvelle permission ajoutée avec succès');
    }

    public function edit(Permission $permission)
    {
        return view('backend.permissions.update',compact('permission'));
    }

    public function update(Request $request,Permission $permission)
    {
        $data = $request->validate([
            'name'=>'required|string'
        ]);
            $permission->name = $request->name;
            $permission->update();
    
        return redirect()->route('permissions.index')->with('success','permission mise a jour avec succès');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->back()->with('success','permission Supprimée avec succès');
    }
}
