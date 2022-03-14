<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collecte;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collectes = Collecte::latest()->get();
        return view('backend.collectes.index',compact('collectes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.collectes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*dd($request->image);
        die();*/
        $data = $request->validate([
            'titre'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|file|max:1024'
        ]);
        $filename = time().'.'.$request->image->extension();
        $img = $request->file('image')->storeAs('collectesImages',$filename,'public');
        $data = new Collecte();

        $data->titre = $request->titre;
        $data->image = $img;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('admin.collectes.index')->with('success','Nouvelle Collecte ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collecte $collecte)
    {
        //
        return view('backend.collectes.view',compact('collecte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Collecte $collecte)
    {
        //
        return view('backend.collectes.update',compact('collecte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Collecte $collecte)
    {
        //
        /*dd($request->image);
        die();*/
        $data = $request->validate([
            'titre'=>'required|string',
            'description'=>'required|string',
            'image'=>'required|file|max:1024'
        ]);
        $filename = time().'.'.$request->image->extension();

        if(Storage::disk('public')->exists($collecte->image)){
            Storage::disk('public')->delete($collecte->image);
            $collecte->titre = $request->titre;
            $collecte->image = $request->file('image')->storeAs('collectesImages',$filename,'public');
            $collecte->description = $request->description;
            $collecte->update();
        }
    
        return redirect()->route('admin.collectes.index')->with('success','Collecte mise a jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collecte $collecte)
    {
        //
        $path = $collecte->image;
        if(Storage::disk('public')->exists($collecte->image)){
            //
            (Storage::disk('public')->delete($path));
        }
        $collecte->delete();
        return redirect()->back()->with('success','Collecte Supprimée avec succès');
    }
}
