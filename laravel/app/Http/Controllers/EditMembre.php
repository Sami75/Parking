<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;	
use Auth;

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

	/*public function store(Request $data){


		DB::table('membres')->where('id', '=', $id)->delete();

		return view('admin.editmembre');
	}*/

}
