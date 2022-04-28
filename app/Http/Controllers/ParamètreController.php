<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParamètreController extends Controller

{
    public $filtre = "";
    function __construct()

    {

        $this->middleware('permission:parametre-list', ['only' => ['index']]);
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $filtres = DB::table('users')
                    ->join('transactions', 'users.id', '=', 'transactions.user_id')
                    ->whereBetween('transactions.created_at', [$start_date, $end_date])
                    ->orderBy('transactions.id', 'desc')
                    ->get();
                } else {
                    $filtres =  DB::table('users')
                    ->join('transactions', 'users.id', '=', 'transactions.user_id')
                    ->orderBy('transactions.id', 'desc')
                    ->latest('transactions.created_at')
                    ->get();
                }
            } else {
                $filtres = DB::table('users')
                ->join('transactions', 'users.id', '=', 'transactions.user_id')
                ->orderBy('transactions.id', 'desc')
                ->latest('transactions.created_at')
                ->get();
            }

            return response()->json([
                'filtres' => $filtres
            ]);
        } else {
            abort(403);
        }
    }

    public function index()
    {
        $messageNotification = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->skip(5)
            ->take(4)
            ->select('*')
            ->get();

        $compter = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->orderBy('contacts.id', 'desc')
            ->select('*')
            ->get();

        $transactions = DB::table('users')
            ->join('transactions', 'users.id', '=', 'transactions.user_id')
            ->orderBy('transactions.id', 'desc')
            ->get();

        return view('backend.parametre.index', ['messageNotification' => $messageNotification, 'compter' => $compter, 'transactions' => $transactions]);
    }
}
