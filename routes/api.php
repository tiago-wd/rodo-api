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

});    