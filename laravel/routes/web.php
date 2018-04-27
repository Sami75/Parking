<?php

use App\Http\Middleware\IsAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Accueil*/
Route::get('/', function () {
    return view('welcome');

});

Route::get('mdpoublier', 'Contacts@create')->name('mdpoublier');
Route::post('confirmation', 'Contacts@store')->name('confirmation');


/*Membre route*/

/*Route pour la reservation d'une place de parking*/
Route::get('reserver', 'Reserver@create')->name('reserverplace');
Route::get('send/{membre}','Reserver@send')->name('sendplace');
Route::get('sended/{message}', 'Reserver@send')->name('sended');

/*Route pour l'édition du profil du membre connecté*/
Route::get('/profilemembre', 'Profile@create')->name('profilemembre');
Route::get('/editprofile', 'Profile@show')->name('editprofile');
Route::get('/editpwdmembre', 'Profile@showpwd')->name('editpwdmembre');
Route::post('/updateprofile', 'Profile@updateprofile')->name('updateprofile');
Route::post('/updatepwdmembre', 'Profile@updatepwd')->name('updatepwdmembre');

/*Route pour afficher l'historique des places réservés*/
Route::get('historique', 'Historique@create')->name('histo');


Auth::routes();

/* Espace Utilisateur */
Route::get('home', 'HomeController@index')->name('home');


	/*Admin route*/
	
	/* Espace Administrateur */
	Route::get('admin', ['middleware' => 'admin', 'uses' => 'HomeController@index'])->name('admin');


    /*Routes pour l'édition des informations d'un membres*/
    Route::get('editmembre', ['middleware' => 'admin', 'uses' => 'EditMembre@create'])->name('editmembre');
	Route::get('selection/{membres}', ['middleware' => 'admin', 'uses' =>  'EditMembre@show'])->name('selection');
	Route::get('supprimer/{membres}', ['middleware' => 'admin', 'uses' => 'EditMembre@delete'])->name('supprimer');
	Route::post('updaterang/{membres}', ['middleware' => 'admin', 'uses' => 'EditMembre@updaterang'])->name('updaterang');
	Route::post('updatepwd/{membres}', ['middleware' => 'admin', 'uses' => 'EditMembre@updatepwd'])->name('updatepwd');
	Route::get('editpwd/{membres}', ['middleware' => 'admin', 'uses' => 'EditMembre@showpwd'])->name('editpwd');
	Route::get('editrang/{membres}', ['middleware' => 'admin', 'uses' => 'EditMembre@showrang'])->name('editrang');
	Route::get('validermembre', ['middleware' => 'admin', 'uses' => 'EditMembre@showvalider'])->name('validermembre');
	Route::get('updatemembre/{membres}', ['middleware' => 'admin', 'uses' => 'EditMembre@updatemembre'])->name('updatemembre');


	/*Routes pour l'édition des places de parkings*/
	Route::get('editplace', ['middleware' => 'admin', 'uses' => 'EditPlace@create'])->name('editplace');
	Route::get('creationplace', ['middleware' => 'admin', 'uses' => 'EditPlace@show'])->name('creation');
	Route::post('addedplace', ['middleware' => 'admin', 'uses' => 'EditPlace@add'])->name('added');
	Route::get('selectionplace/{idplace}', ['middleware' => 'admin', 'uses' => 'EditPlace@showplace'])->name('selectionplace');
	Route::get('deleteplace/{places}', ['middleware' => 'admin', 'uses' => 'EditPlace@deleteplace'])->name('deleteplace');


	/*Routes pour l'attribution et la validation d'une place de parking*/
	Route::get('ajoutplace', ['middleware' => 'admin', 'uses' => 'AjoutPlace@create'])->name('ajoutplace');
	Route::get('addplace/{membre}', ['middleware' => 'admin', 'uses' => 'AjoutPlace@show'])->name('addplace');
	Route::post('updateplace/{membre}', ['middleware' => 'admin', 'uses' => 'AjoutPlace@updateplace'])->name('updateplace');


	/*Route pour affichier l'historique des attribtions des places*/
	Route::get('/historiqueplace', ['middleware' => 'admin', 'uses' => 'Historique@createadmin'])->name('histoadmin');


	/*Route pour afficher la file d'attente*/
	Route::get('/listeattente', ['middleware' => 'admin', 'uses' => 'ListeAttente@create'])->name('listeattente');