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
            /* Recupération du rang le plus petit dans la table membres*/
            $rang = Auth::user()->rang;
            $rangmin = DB::table('membres')
                ->min('rang');
            /* On récupére tout les comptes qui ont été validé par l'administrateur*/
            $membrevalider = Auth::user()->valider;
            /* On récupere l'id du membre qui est connecté */
            $id = Auth::User()->id;
            /* On récupére la date d'aujoud'hui */
            $today = date('Y-m-d');
            /*On vérifie que le membre n'est pas un admin*/
            $membreadmin = DB::table('membres')
                ->where('admin', '=', 0)
                ->first();
            /* On affecte la valeur du champ admin de la table membres */    
            $admin = $membreadmin->admin;
            /*On récupere la premiere ligne de la table reserver où le champ 'id' = $id*/
            $reserver=DB::table('reserver')
                ->where('id', '=', $id)
                ->where('finperiode', '>', $today)
                ->first();
            /*On vérifie si $rangmin n'est pas nul, pour éviter une erreur, on affecte ensuite un bool*/
            if($rangmin == null)
            {
                $rangbool = 0;
            }
            else {
                $rangbool = 1;
            }
            /* Si réserver est null on affecte à différente variable une valeur pour permettre l'affichage des places, du rang, de la validation du compte...Dans l'espace utilisateur du membre*/
            
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
                if($reserver < $today) {
                    $datecompare = 0;
                }
                else {
                    $datecompare = 1;
                }
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
                $rangmax = DB::table('membres')
                            ->max('rang');
                if($rangmax>1) {     
                    DB::table('membres')->decrement('rang');
                }
            }
            // if(!$datecompare){
            //     DB::table('places')
            //         ->where('idplace', '=', $idplacemembre)
            //         ->update(['reserver' => 1]);
            // }
            return view('membres.home', compact('rang', 'numplacemembre', 'debutperiode', 'finperiode', 'datecompare', 'validation', 'membrevalider'));
    }
}