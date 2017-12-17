<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;

class Historique extends Controller
{
    public function create()
    {
    	$membre = Auth::user();
    	$reservations = DB::table('reserver')->where('id', '=', $membre->id)->get()->all();
    	return view('membres.historique', compact('membre', 'reservations'));
    }

    public function createadmin()
    {
    	$reservations = DB::table('reserver')->get()->all();
    	$membres = Auth::User()->all();
    	$places = DB::table('places')->get()->all();
    	$today = date('Y-m-d');
    	return view('admin.historiqueplace', compact('membres', 'reservations', 'places', 'today'));
    }
}
