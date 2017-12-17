<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Carbon\Carbon;

class Reserver extends Controller
{
	public function create() {

		$membre = Auth::User();

		return view('membres.reserver', compact('membre'));
	}    

	public function send($id) {

		$membre = User::findOrFail($id);

		$reservation = DB::table('reserver')
						  ->where('id', '=', $id)
						  ->first();

		$verif = DB::table('places')
					->where('reserver', '=', 1)
					->first();

		$today = date('Y-m-d');

		$comparedate=DB::table('reserver')
			->select([
				'id',
				'finperiode',
			])
			->where('id', '=', $id)
			->whereRaw('finperiode')
			->first();

		if($comparedate == null) {
			$datecompare = 0;
		}
		else {
			if($comparedate > date('Y-m-d'))
			{
				$datecompare = 0;
			}
			else {
				$datecompare = 1;	
			}
		}

		if($verif == null) {
			$dispo = 0;
		}
		else {
		$dispo = $verif->reserver;
		}

		$today = date('Y-m-d');
		if($reservation == null) {

			$value = '0';
		}
		else {
			$value = $reservation->id;
			$finperiode = $reservation->finperiode;
		}

		if($datecompare)
		{	
			$message = 'Vous avez déjà fais une demande de réservation, votre administrateur, vous attribuera une période';

			return redirect()->route('home');
		}

		else if((!$datecompare) && ($dispo)) {

			$place = DB::table('places')
					->inRandomOrder()
					->where('reserver', '=', 1)
					->first();


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
				->update(['rang' => 0]);
				

			$message = 'Votre demande de réservation à été pris en compte, veuillez patientez le temps que votre administrateur vous renseigne les date de début et de fin de réservation !';

			return redirect()->route('home');
		}
		else {

			$lastrang = DB::table('membres')
							->max('rang');

			DB::table('membres')
				->where('id', '=', $id)
				->update(['rang' => $lastrang+1 ]);

			$message = "Il n'y a plus de place de parking disponible, vous êtes placé en file d'attente";


			return redirect()->route('home');
		}


		

	}
}
