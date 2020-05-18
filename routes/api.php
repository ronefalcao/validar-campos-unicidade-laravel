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
Route::get('/bairros', function () {

    return "ok";

});
 
 Route::post('bairros', 'BairrosController@store');
 Route::put('bairros/{id}', 'BairrosController@update');
