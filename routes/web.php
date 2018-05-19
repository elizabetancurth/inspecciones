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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('extintores', 'ExtintorController');
Route::resource('botiquines', 'BotiquinController');
Route::resource('insumos_botiquines', 'InsumoBotiquinController');
Route::resource('formatos', 'FormatoController');
Route::resource('preguntas', 'PreguntaFormatoController');
Route::resource('inspecciones', 'InspeccionController');
Route::resource('inspecciones_extintores', 'InspeccionExtintorController');

//**---------- Inactivos ---------- **//

Route::get('extintores_inactivos', [ 'as' => 'extintores.inactivos', 'uses' => 'ExtintorController@frm_inactivos']);
Route::get('botiquines_inactivos', [ 'as' => 'botiquines.inactivos', 'uses' => 'BotiquinController@frm_inactivos']);
Route::get('formatos_inactivos', [ 'as' => 'formatos.inactivos', 'uses' => 'FormatoController@frm_inactivos']);

//**---------- Rutas específicas ---------- **//

Route::get('crear_insumo/{id}', [ 'as' => 'insumos_botiquines.create_insumo', 'uses' => 'InsumoBotiquinController@create_insumo']);
Route::get('crear_pregunta/{id}', [ 'as' => 'preguntas.create_pregunta', 'uses' => 'PreguntaFormatoController@create_pregunta']);


//**---------- Rutas Servicio Web REST ---------- **//

Route::group(['middleware' => 'cors'], function()
{
    Route::post('login_api', 'ApiAuthController@UserAuth');
});

Route::group(array('prefix' => 'api'), function()
{
    Route::get('extintores', 'api\ExtintorController@listAll');
    Route::get('extintores/{id}', 'api\ExtintorController@listOne');
    Route::post('extintores', 'api\ExtintorController@create');
});