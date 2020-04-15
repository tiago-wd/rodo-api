<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', '\App\Http\Controllers\AuthController@login');
    Route::post('register', '\App\Http\Controllers\AuthController@signup');
    Route::get('signup/activate/{token}', '\App\Http\Controllers\AuthController@signupActivate');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', '\App\Http\Controllers\AuthController@logout');
        Route::get('user', '\App\Http\Controllers\AuthController@user');
    });
});

Route::group(['prefix' => 'password'], function () {    
    Route::post('create', '\App\Http\Controllers\PasswordResetController@create');
    Route::get('find/{token}', '\App\Http\Controllers\PasswordResetController@find');
    Route::post('reset', '\App\Http\Controllers\PasswordResetController@reset');
});

Route::group(['prefix' => 'users'], function () {    
    Route::get('/', 'UserAPIController@index');
    Route::post('/', 'UserAPIController@store');
    Route::get('/{id}', 'UserAPIController@show');
    Route::put('/{id}', 'UserAPIController@update');
    Route::delete('/{id}', 'UserAPIController@destroy');
});    

Route::group(['prefix' => 'transport_types'], function () {    
    Route::get('/', 'TransportTypeAPIController@index');
    // Route::post('/', 'TransportTypeAPIController@store');
    Route::get('/{id}', 'TransportTypeAPIController@show');
    // Route::put('/{id}', 'TransportTypeAPIController@update');
});    

Route::group(['prefix' => 'transports'], function () {    
    Route::get('/', 'TransportAPIController@index');
    Route::post('/', 'TransportAPIController@store');
    Route::get('/{id}', 'TransportAPIController@show');
    Route::put('/{id}', 'TransportAPIController@update');
    Route::delete('/{id}', 'TransportAPIController@destroy');
});

Route::group(['prefix' => 'cargo_types'], function () {    
    Route::get('/', 'CargoTypeAPIController@index');
    // Route::post('/', 'CargoTypeAPIController@store');
    Route::get('/{id}', 'CargoTypeAPIController@show');
    // Route::put('/{id}', 'CargoTypeAPIController@update');
});

Route::group(['prefix' => 'cargos'], function () {    
    Route::get('/', 'CargoAPIController@index');
    Route::post('/', 'CargoAPIController@store');
    Route::get('/{id}', 'CargoAPIController@show');
    Route::put('/{id}', 'CargoAPIController@update');
    Route::delete('/{id}', 'CargoAPIController@destroy');
});

Route::group(['prefix' => 'bids'], function () {    
    Route::get('/', 'BidAPIController@index');
    Route::post('/', 'BidAPIController@store');
    Route::get('/{id}', 'BidAPIController@show');
    Route::put('/{id}', 'BidAPIController@update');
    Route::delete('/{id}', 'BidAPIController@destroy');
});