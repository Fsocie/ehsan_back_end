<?php

namespace App\Http\Controllers;

use App\Models\Geolocalisation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $users = User::where('is_admin', '0')->limit(50)->get();

        $cas = Geolocalisation::orderBy('id', 'desc')
            ->limit(10)->get();

        $message = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(3)
            ->take(2)
            ->select('*')
            ->get();

        return view('backend.home.index', compact('users', 'cas', 'message'));
    }


    public function adminHome()

    {

        return view('auth.login');
    }
}
