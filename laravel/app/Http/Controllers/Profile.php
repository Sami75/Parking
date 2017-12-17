<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class Profile extends Controller
{
    public function create()
    {

    	return view('membres.profilemembre');
    }

    public function show()
    {
    	return view('membres.editprofile');
    }

    public function showpwd()
    {

    	return view('membres.editpwdmembre');
    }

    public function updateprofile(Request $request)
    {
    	$membre = Auth::User();

    	$membre->update([
    		'login' => 'inchange',
    		'email' => 'inchange@mail.fr'
    	]);

    	$this->validate($request, [
			'login' => 'required|string|max:50|unique:membres',
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:membres',
            'tel' => 'required|numeric',
		]);

		$membre->update([
			'login' => $request->login,
			'nom' => $request->nom,
			'prenom' => $request->prenom,
			'email' => $request->email,
			'tel' => $request->tel,
		]);

		return redirect()->route('profilemembre');
    }
}
