<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EditRang extends Controller
{
    protected function create()
	{

		$membres = User::all();
		return view('admin.editrangmembre', compact('membres'));
	}

	public function show($id)
	{
		$membres = User::findOrFail($id);
		return view('admin.selection', compact('membres'));
	}

	protected function update(Request $request, $id)	
	{
		$this->validate($request, [
			'rang' => 'required|numeric',
		]);

		User::update(['rang' => $request->rang]);

		return redirect()->route('admin.editmembre', $id);
	}

}
