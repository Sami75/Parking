<?php

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

Route::get('home', 'HomeController@index')->name('home');

/*Admin route*/
Route::get('admin_area', ['middleware' => 'admin', function () {

    Route::get('admin', 'HomeController@index')->name('admin');

    /*Routes pour l'édition des informations d'un membres*/
    Route::get('editmembre', 'EditMembre@create')->name('editmembre');
	Route::get('selection/{membres}', 'EditMembre@show')->name('selection');
	Route::get('supprimer/{membres}', 'EditMembre@delete')->name('supprimer');
	Route::post('updaterang/{membres}', 'EditMembre@updaterang')->name('updaterang');
	Route::post('updatepwd/{membres}', 'EditMembre@updatepwd')->name('updatepwd');
	Route::get('editpwd/{membres}', 'EditMembre@showpwd')->name('editpwd');
	Route::get('editrang/{membres}', 'EditMembre@showrang')->name('editrang');
	Route::get('validermembre', 'EditMembre@showvalider')->name('validermembre');
	Route::get('updatemembre/{membres}', 'EditMembre@updatemembre')->name('updatemembre');

	/*Routes pour l'édition des places de parkings*/
	Route::get('editplace', 'EditPlace@create')->name('editplace');
	Route::get('creationplace', 'EditPlace@show')->name('creation');
	Route::post('addedplace', 'EditPlace@add')->name('added');
	Route::get('selectionplace/{idplace}', 'EditPlace@showplace')->name('selectionplace');
	Route::get('deleteplace/{places}', 'EditPlace@deleteplace')->name('deleteplace');

	/*Routes pour l'attribution et la validation d'une place de parking*/
	Route::get('ajoutplace', 'AjoutPlace@create')->name('ajoutplace');
	Route::get('addplace/{membre}', 'AjoutPlace@show')->name('addplace');
	Route::post('updateplace/{membre}', 'AjoutPlace@updateplace')->name('updateplace');

	/*Route pour affichier l'historique des attribtions des places*/
	Route::get('/historiqueplace', 'Historique@createadmin')->name('histoadmin');

	/*Route pour afficher la file d'attente*/
	Route::get('/listeattente', 'ListeAttente@create')->name('listeattente');
}]);