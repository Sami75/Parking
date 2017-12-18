<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class Contacts extends Controller
{
    public function create()
    {
    	return view ('auth.mdpoublier');
    }

    public function store(Request $request)
    {
    	Mail::to('sami.thairi@hotmail.fr')
    		->send(new Contact($request->except('_token')));

    	echo'<script>alert("Votre demande de nouveau mot de passe a était envoyé à l\'administrateur, il vous enverra un mail avec un nouveau mot de passe !"); window.location.href="/"</script>';
    }
}
