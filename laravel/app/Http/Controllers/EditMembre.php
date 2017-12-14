<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;	
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class EditMembre extends Controller
{
	protected function create()
	{

		$membres = User::all();
		return view('admin.editmembre', compact('membres'));
	}

	public function show($id)
	{
		$membres = User::findOrFail($id);
		return view('admin.selection', compact('membres'));
	}

	public function showpwd($id)
	{
		$membres = User::findOrFail($id);
		return view('admin.editpwd', compact('membres'));
	}

	public function showrang($id)
	{
		$membres = User::findOrFail($id);
		return view('admin.editrang', compact('membres'));
	}

	protected function delete($id)	
	{
		$membre = User::where('id', $id)->first(); // File::find($id)

		if($membre) {

    		$membre->delete();
    		$membres = User::all();
    		return view('admin.editmembre', compact('membres'));
		}	
	}

	protected function updaterang(Request $request, $id)
	{

		$this->validate($request, [
			'rang' => 'numeric|unique:membres',
		]);

		$membre = User::findorFail($id);

		$membre->update(['rang' => $request->rang, ]);

		return redirect()->route('editmembre', $membre);
	}

	protected function updatepwd(Request $request, $id)
	{
		$this->validate($request, [
			'password' => 'required|string|min:6|confirmed',
		]);

		$membre = User::findorFail($id);

		$membre->update(['password' => Hash::make($request->password)]);
			// 'password' => Hash::make($request->password)]);

		return redirect()->route('editmembre', $membre);
	}
}
