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


// public ad endpoints
Route::get('/ads', 'AdController@index');
Route::get('/ads/{ad}', 'AdController@show');


// auth endpoints (user&admin)
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {

  Route::post('login', 'AuthController@login'); 
  Route::post('register', 'AuthController@register'); 

});

// protected endpoints
Route::group(['middleware' => 'auth:api'], function () {

  Route::get('/me', 'AuthController@me');
  Route::get('/findMyAds', 'AdController@getByAuthUser');
  Route::post('/ads', 'AdController@store');
  Route::put('/updateAd/{ad}', 'AdController@update');
  Route::delete('/deleteAd/{ad}', 'AdController@destroy');

});
