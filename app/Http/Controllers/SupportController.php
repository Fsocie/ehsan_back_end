<?php

namespace App\Http\Controllers;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    //

    public function index()
    {   
        $supports = Support::all();
        //dd($supports);
        return view('backend.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('backend.supports.create');
    }
    public function store(Request $request)
    {   
        $message = [
            'nom_support.required'=>'Entrer le nom du support',
            'nom_support.min'=>'Nom du support trop court',
            'nom_support.max'=>'Nom du support trop long',
        ];
        $data = $request->validate([
            'nom_support'=>'required|string|min:2|max:10'
        ],$message);
        Support::create($data);
        return redirect()->route('supports.index')->with('success','Nouvean support ajouté avec success');
    }

    public function show(Support $support)
    {
        
    }
    public function edit(Support $support)
    {
        
    }
    public function update(Support $support)
    {
        
    }
    public function destroy(Support $support)
    {
        $support->delete();
        return redirect()->back()
        ->with('success', "Le support a été supprimé avec succès !!!");
    }
}
