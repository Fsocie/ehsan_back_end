<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaysController extends Controller
{
    public function index()
    {

        $pays = Pays::all();
        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        return view('backend.pays.index', ['pays' => $pays, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }


    public function viewformupdate(Request $request, $id)
    {

        $pays = Pays::find($id);
        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        return view('backend.pays.update', ['pays' => $pays, 'messageNotification' => $messageNotification, 'compter' => $compter]);
    }


    public function viewformadd()
    {

        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        return view('backend.pays.add', ['messageNotification' => $messageNotification, 'compter' => $compter]);
    }

    /* Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
    public function store(Request $request)
    {

        $pays = new pays();
        $pays->nom = $request->input('nom');
        $pays->abr = $request->input('abr');
        $pays->indicatif = $request->input('indicatif');
        $pays->save();

        return redirect()->route('admin.pays.index')->with('success', 'Pays ajouté avec succès');
    }

    public function update(Request $request, $id)
    {

        $pays = Pays::find($id);

        if ($pays) {

            $pays->nom = $request->input('nom');
            $pays->abr = $request->input('abr');
            $pays->indicatif = $request->input('indicatif');
            $pays->save();
        }


        return redirect()->route('admin.pays.index')->with('success', 'Mise à jour  éffectuée avec succès');
    }


    public function destroy($id)
    {
        $pays = Pays::find($id);
        $pays->delete();

        return redirect()->route('admin.pays.index')->with('success', 'suppression éffectuer');
    }
}
