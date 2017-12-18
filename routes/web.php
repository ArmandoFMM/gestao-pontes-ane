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

Route::get('/','HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/unautorized', 'HomeController@unautorized');

Route::resource('pontes','PonteController');

Route::resource('inspecoes','InspecaoController');

Route::resource('estados','EstadosController');

Route::get('/hidden-pontes','PonteController@hiddenPontes');

Route::get('/validar-pontes', 'PonteController@validarPontes')->middleware('can:validar,App\Ponte');;

Route::post('/validar-ponte', 'PonteController@validarPonte');

Route::get('/inspecoes-history/{id}', 'PonteController@inspecoesByPonte');

Route::get('/todas-pontes','PonteController@todasPontes');

Route::get('/todos-problemas','ProblemasController@getAllProblemas');

Route::get('/inspecao/{id}','InspecaoController@inspecaoById');

Auth::routes();