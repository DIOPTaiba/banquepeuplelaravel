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

Route::get('/clientnonsalarie/add', 'ClientnonsalarieController@add')->name('addclientnonsalarie');
Route::post('/clientnonsalarie/persist', 'ClientnonsalarieController@persist')->name('persistclientnonsalarie');
Route::get('/clientnonsalarie/getAll', 'ClientnonsalarieController@getAll')->name('getallclientnonsalarie');
Route::get('/clientnonsalarie/edit/{id}', 'ClientnonsalarieController@edit')->name('editclientnonsalarie');
Route::post('/clientnonsalarie/update', 'ClientnonsalarieController@update')->name('updateclientnonsalarie');

Route::get('/clientsalarie/add', 'ClientsalarieController@add')->name('addclientsalarie');
Route::post('/clientsalarie/persist', 'ClientsalarieController@persist')->name('persistclientsalarie');
Route::get('/clientsalarie/getAll', 'ClientsalarieController@getAll')->name('getallclientsalarie');
