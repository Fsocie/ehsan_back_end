<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collecte;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CollectController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:collecte-list|collecte-create|collecte-edit|collecte-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:collecte-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:collecte-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:collecte-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collectes = Collecte::latest()->get();
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();
        return view('backend.collectes.index', ['collectes'=>$collectes, 'message'=>$message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();
        return view('backend.collectes.create',['message'=>$message]);
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
            'titre' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|file|max:1024'
        ]);
        $filename = time() . '.' . $request->image->extension();
        $img = $request->file('image')->storeAs('collectesImages', $filename, 'public');
        $data = new Collecte();

        $data->titre = $request->titre;
        $data->image = $img;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('admin.collectes.index')->with('success', 'Nouvelle Collecte ajoutée avec succès');
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
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();
        return view('backend.collectes.view', compact('collecte', 'message'));
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
        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();
        return view('backend.collectes.update', compact('collecte', 'message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collecte $collecte)
    {
        //
        /*dd($request->image);
        die();*/
        $data = $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|file|max:1024'
        ]);
        $filename = time() . '.' . $request->image->extension();

        if (Storage::disk('public')->exists($collecte->image)) {
            Storage::disk('public')->delete($collecte->image);
            $collecte->titre = $request->titre;
            $collecte->image = $request->file('image')->storeAs('collectesImages', $filename, 'public');
            $collecte->description = $request->description;
            $collecte->update();
        }

        return redirect()->route('admin.collectes.index')->with('success', 'Collecte mise a jour avec succès');
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
        if (Storage::disk('public')->exists($collecte->image)) {
            //
            (Storage::disk('public')->delete($path));
        }
        $collecte->delete();
        return redirect()->back()->with('success', 'Collecte Supprimée avec succès');
    }
}
