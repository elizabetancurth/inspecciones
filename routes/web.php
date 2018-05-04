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

//**---------- Inactivos ---------- **//

Route::get('extintores_inactivos', 'ExtintorController@frm_inactivos');