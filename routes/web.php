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
    return view('readme');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('users', 'UserController');

Route::resource('transportTypes', 'TransportTypeController');

Route::resource('transports', 'TransportController');

Route::resource('cargoTypes', 'CargoTypeController');

Route::resource('cargos', 'CargoController');

Route::resource('bids', 'BidController');