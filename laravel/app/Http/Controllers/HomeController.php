<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controller\Auth\LoginController;
use DB;

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

            if($rang == null) 
            {
                $rang = "---";
            }

            $id = Auth::user()->id;

            $reserver = DB::table('reserver')
                ->where('id', '=', $id)
                ->first();

            if($reserver == null)
            {
                $reserver = "no";
                $message = "L'adminstrateur se charge dans un future proche de vous communiquer vos dates !";
            }
            else
            {
                $idplacemembre = $reserver->idplace;
                $debutperiode = $reserver->debutperiode;
                $finperiode = $reserver->finperiode;
            }

            $numplace = DB::table('places')
                ->where('idplace', '=', $idplacemembre)
                ->first();

            if($numplace == null)
            {
                $numplacemembre = "---";
            }
            else
            {
                $numplacemembre = $numplace->numplace;
            }

            return view('membres.home', compact('rang', 'numplacemembre', 'debutperiode', 'finperiode', 'message'));
    }
}
