<?php

namespace App\Http\Controllers;

use App\Models\Geolocalisation;
use App\Models\Transaction;
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
        $transactions = DB::table('transactions')
            ->sum('montant');
            

        $cas = Geolocalisation::orderBy('id', 'desc')
            ->limit(10)->get();

        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->take(4)
            ->select('*')
            ->get();

        $messagesss = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->take(1)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->select('*')
            ->get();

        $transactionsJours =DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->whereDate('transactions.created_at', '=', now())
            ->orderBy('transactions.id', 'desc')
            ->get();
            //dump($transactions);

        return view('backend.home.index', compact('users', 'cas', 'messageNotification', 'messagesss', 'compter', 'transactionsJours', 'transactions'));
    }


    public function adminHome()

    {

        return view('auth.login');
    }
}
