<?php

namespace App\Http\Controllers;

use App\Models\Geolocalisation;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::where('is_admin','0')->limit(50)->get();

       $cas=Geolocalisation::orderBy('id','desc')
       ->limit(10) ->get();

        return view('backend.home.index',compact('users','cas'));
    }


    public function adminHome()

    {

        return view('auth.login');

    }

}
