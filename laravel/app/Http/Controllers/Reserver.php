<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class Reserver extends Controller
{
	public function create() {

		$membre = Auth::User();

		return view('membres.reserver', compact('membre'));
	}    

	public function send($id) {

		$membre = User::findOrFail($id);
		$place =
	}
}
