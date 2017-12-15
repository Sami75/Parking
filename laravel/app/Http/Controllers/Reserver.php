<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;

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
					->where('reserver', '=', 1);

		if($reservation == null) {

			$value = '0';
		}
		else {
			$value = $reservation->id;
		}

		if(($value == $id))
		{	
			$message = 'Vous avez déjà fais une demande de réservation, votre administrateur, vous attribuera une période';

			return redirect()->route('home');
		}
		else if(($value == $id) || ($verif)) {

			$place = DB::table('places')
					->inRandomOrder()
					->where('reserver', '=', 1)
					->first();


			$idplace = $place->idplace;
			$placemembre = $place->numplace;
			$date = date('Y-m-d');


			DB::table('reserver')->insert([
				'idplace' => $idplace,
				'id' => $id,
				'debutperiode' => $date,
				'finperiode' => $date
			]);

			DB::table('places')
				->where('numplace', '=', $placemembre)
				->update(['reserver' => 0]);
				

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
