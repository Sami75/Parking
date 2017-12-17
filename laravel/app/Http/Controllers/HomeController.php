<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controller\Auth\LoginController;
use DB;
use App\user;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin) 
            return view('admin.admin'); 
            
        else 

            $rang = Auth::user()->rang;
            $membrevalider = Auth::user()->valider;
            $rangmin = DB::table('membres')
                ->min('rang');
        
            if($rangmin == null)
            {
                $rangbool = 0;
            }
            else {
                $rangbool = 1;
            }


            $id = Auth::User()->id;
            $today = date('Y-m-d');
            $membreadmin = DB::table('membres')
                ->where('admin', '=', 0)
                ->first();

            $admin = $membreadmin->admin;

            $reserver=DB::table('reserver')
                ->where('id', '=', $id)
                ->where('finperiode', '>', $today)
                ->first();


            if($reserver != null) {

                if($reserver < $today) {
                    $datecompare = 0;
                }
                else {
                    $datecompare = 1;
                }
            }

            $id = Auth::user()->id;
            
            if($reserver == null)
            {
                $reserver = "no";
                $numplace = null;
                $datecompare = 0;
                $idplacemembre = 0;
                $validation = 0;
            }
            else
            {
                $validation = $reserver->valider;
                $idplacemembre = $reserver->idplace;
                $debutperiode = $reserver->debutperiode;
                $finperiode = $reserver->finperiode;
                $numplace = DB::table('places')
                ->where('idplace', '=', $idplacemembre)
                ->first();
            }
            
            if($numplace == null)
            {
                $numplacemembre = "---";
            }
            else
            {
                $numplacemembre = $numplace->numplace;
            }

            $dispo = DB::table('places')
                ->inRandomOrder()
                ->where('reserver', '=', 1)
                ->first();

            if($dispo == null)
            {
                $libre = 0;
            }
            else
            {
                $libre = $dispo->reserver;
            }
            
            if(($libre) && ($rangbool) && (!$admin) && (!$datecompare)) {

                $membrerangmin = DB::table('membres')
                    ->where('rang', '=', $rangmin)
                    ->first();


                $place = DB::table('places')
                    ->inRandomOrder()
                    ->where('reserver', '=', 1)
                    ->first();

                $id = $membrerangmin->id;
                
                $idplace = $place->idplace;
                $placemembre = $place->numplace;
                $date = date('Y-m-d');
                $date2 = Carbon::now()->addMonths(1);


                DB::table('reserver')->insert([
                    'idplace' => $idplace,
                    'id' => $id,
                    'debutperiode' => $date,
                    'finperiode' => $date2
                ]);

                DB::table('places')
                    ->where('numplace', '=', $placemembre)
                    ->update(['reserver' => 0]);
                    
                DB::table('membres')
                    ->where('id', '=', $id)
                    ->update(['rang' => null]);                
            }
            if(!$datecompare){

                DB::table('places')
                    ->where('idplace', '=', $idplacemembre)
                    ->update(['reserver' => 1]);
            }

            return view('membres.home', compact('rang', 'numplacemembre', 'debutperiode', 'finperiode', 'datecompare', 'validation', 'membrevalider'));
    }
}
