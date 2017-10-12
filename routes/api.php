<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, X-XSRF-TOKEN');

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('auth', 'AuthController@auth');

Route::get('todas-pontes','PonteController@todasPontes');


Route::group(['middleware' => 'auth:api'], function(){


    // Route::get('todas-pontes','PonteController@todasPontes');

    Route::get('todos-distritos','DistritoController@todosDistritos');

    Route::get('todas-estradas','EstradaController@todasEstradas');

    Route::get('todos-tipos','TipoDePonteController@todosTipos');

    Route::post('registar-ponte','PonteController@registar');

    Route::post('upload','PonteController@uploadPhotos');

});
