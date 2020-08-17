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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/medecin/add', 'MedecinController@add')->name('addmedecin');
Route::get('/medecin/getAll', 'MedecinController@getAll')->name('getallmedecin');

Route::get('/rendezvous/add', 'RendezvousController@add')->name('addrendezvous');
Route::get('/rendezvous/getAll', 'RendezvousController@getAll')->name('getallrendezvous');
