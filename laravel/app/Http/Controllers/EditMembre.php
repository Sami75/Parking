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

	protected function delete($id)	
	{
		$membre = User::where('id', $id)->first(); // File::find($id)

		if($membre) {

    		$membre->delete();
    		$membres = User::all();
    		return view('admin.editmembre', compact('membres'));
		}	
	}

	protected function update(Request $request, $id)
	{

		$this->validate($request, [
			'rang' => 'numeric|unique:membres',
			'password' => 'string'
		]);

		$membre = User::findorFail($id);

		$membre->update(['rang' => $request->rang, 'password' => Hash::make($request->password)]);

		return redirect()->route('editmembre', $membre);
	}
}
