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

Route::get('/attribplace', function() {
	return view('admin.attribplace');
});

Route::get('/editmembre', function() {
	return view('admin.editmembre');
});

Route::get('/editplace', function() {
	return view('admin.editplace');
});

Route::get('/editrangmembre', function() {
	return view('admin.editrangmembre');
});

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