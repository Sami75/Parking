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

Route::get('/', function () {
    return view('welcome');
});

/*Membre route*/

Route::get('/historique', function() {
	return view('membres.historique');
});

Route::get('/reserver', function() {
	return view('membres.reserver');
});


Route::get('/modifierpwd', function() {
	return view('membres.modifierpwd');
});
/*Membre route*/

/*Admin route*/

use App\Models\Membre;

/*Routes pour l'édition des informations d'un membres*/
Route::get('editmembre', 'EditMembre@create')->name('editmembre');
Route::get('selection/{membres}', 'EditMembre@show')->name('selection');
Route::get('supprimer/{membres}', 'EditMembre@delete')->name('supprimer');
Route::post('updaterang/{membres}', 'EditMembre@updaterang')->name('updaterang');
Route::post('updatepwd/{membres}', 'EditMembre@updatepwd')->name('updatepwd');
Route::get('editpwd/{membres}', 'EditMembre@showpwd')->name('editpwd');
Route::get('editrang/{membres}', 'EditMembre@showrang')->name('editrang');
/*Routes pour l'édition des informations d'un membres*/

/*Routes pour l'édition des places de parkings*/
Route::get('editplace', 'EditPlace@create')->name('editplace');
Route::get('creationplace', 'EditPlace@show')->name('creation');
Route::post('addedplace', 'EditPlace@add')->name('added');
/*Routes pour l'édition des places de parkings*/

Route::get('ajoutplace', 'AjoutPlace@create')->name('ajoutplace');
Route::get('selectionplace/{membres}', 'AjoutPlace@show')->name('selectionplace');
Route::get('addplace/{membres}', 'AjoutPlace@updateplace')->name('addplace');


Route::get('/historiqueplace', function() {
	return view('admin.historiqueplace');
});

Route::get('/rangmembre', function() {
	return view('admin.rangmembre');
});
/*Admin Route*/

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('admin', 'HomeController@index')->name('admin');