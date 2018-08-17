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
Route::resource('establecimientos', 'EstablecimientoController');
Route::resource('formatos', 'FormatoController');
Route::resource('preguntas', 'PreguntaFormatoController');
Route::resource('inspecciones', 'InspeccionController');
Route::resource('inspecciones_extintores', 'InspeccionExtintorController');
Route::resource('respuestas_inspecciones', 'RespuestaInspeccionController');
Route::resource('inspecciones_botiquines', 'InspeccionBotiquinController');
Route::resource('res_inspecciones_botiquines', 'RespuestaInspeccionBotiquinController');
Route::resource('inspecciones_establecimientos', 'InspeccionEstablecimientoController');
Route::resource('res_inspecciones_establecimientos', 'RespuestaInspeccionEstablecimientoController');
Route::resource('usuarios', 'UsuarioController');

//**---------- Inactivos ---------- **//

Route::get('extintores_inactivos', [ 'as' => 'extintores.inactivos', 'uses' => 'ExtintorController@frm_inactivos']);
Route::get('botiquines_inactivos', [ 'as' => 'botiquines.inactivos', 'uses' => 'BotiquinController@frm_inactivos']);
Route::get('formatos_inactivos', [ 'as' => 'formatos.inactivos', 'uses' => 'FormatoController@frm_inactivos']);
Route::get('inspecciones_extintores_inactivos', [ 'as' => 'inspecciones_extintores.inactivos', 'uses' => 'InspeccionExtintorController@frm_inactivos']);
Route::get('establecimientos_inactivos', [ 'as' => 'establecimientos.inactivos', 'uses' => 'EstablecimientoController@frm_inactivos']);
Route::get('inspecciones_establecimientos_inactivos', [ 'as' => 'inspecciones_establecimientos.inactivos', 'uses' => 'InspeccionEstablecimientoController@frm_inactivos']);


//**---------- Rutas específicas ---------- **//

Route::get('crear_insumo/{id}', [ 'as' => 'insumos_botiquines.create_insumo', 'uses' => 'InsumoBotiquinController@create_insumo']);
Route::get('crear_pregunta/{id}', [ 'as' => 'preguntas.create_pregunta', 'uses' => 'PreguntaFormatoController@create_pregunta']);
Route::get('ver_inspecciones_insumos/{id}', [ 'as' => 'inspecciones_botiquines.ver_inspecciones_insumos', 'uses' => 'InspeccionBotiquinController@ver_inspecciones_insumos']);
Route::get('ver_inspecciones_insumo/{id}', [ 'as' => 'inspecciones_botiquines.ver_inspecciones_insumo', 'uses' => 'InspeccionBotiquinController@ver_inspecciones_insumo']);
Route::get('reporte_extintores', [ 'as' => 'reporte_inspecciones.extintores', 'uses' => 'ReportesController@reporte_extintores']);

//**---------- Rutas Servicio Web REST ---------- **//

Route::group(['middleware' => 'cors'], function()
{
    Route::post('login_api', 'ApiAuthController@UserAuth');
});

Route::group(array('prefix' => 'api'), function()
{
    Route::get('edificios', 'api\EdificioController@listAll');
    Route::get('edificios/{id}', 'api\EdificioController@listOne');

    Route::get('ubicaciones', 'api\UbicacionController@listAll');
    Route::get('ubicaciones/{id}', 'api\UbicacionController@listOne');

    Route::get('clasificacion_extintor', 'api\ClasificacionExtintorController@listAll');
    Route::get('clasificacion_extintor/{id}', 'api\ClasificacionExtintorController@listOne');

    Route::get('extintores', 'api\ExtintorController@listAll');
    Route::get('extintores/{id}', 'api\ExtintorController@listOne');
    Route::post('extintores', 'api\ExtintorController@create');

    Route::get('recargas_extintores', 'api\FechaRecargasController@listAll');
    Route::get('recargas_extintores/{id}', 'api\FechaRecargasController@listOne');

    Route::get('inspecciones', 'api\InspeccionController@listAll');
    Route::get('inspecciones/{id}', 'api\InspeccionController@listOne');

    Route::get('inspecciones_extintores', 'api\InspeccionExtintorController@listAll');
    Route::get('inspecciones_extintores/{id}', 'api\InspeccionExtintorController@listOne');

    Route::get('inspecciones_insumos_botiquines', 'api\InspeccionBotiquinController@listAll');
    Route::get('inspecciones_insumos_botiquines/{id}', 'api\InspeccionBotiquinController@listOne');

    Route::get('formatos_inspecciones', 'api\FormatoInspeccionController@listAll');
    Route::get('formatos_inspecciones/{id}', 'api\FormatoInspeccionController@listOne');

    Route::get('preguntas_formatos', 'api\PreguntaFormatoController@listAll');
    Route::get('preguntas_formatos/{id}', 'api\PreguntaFormatoController@listOne');

    Route::get('opciones_respuestas', 'api\OpcionRespuestaController@listAll');
    Route::get('opciones_respuestas/{id}', 'api\OpcionRespuestaController@listOne');

    Route::get('respuestas_inspecciones', 'api\RespuestaInspeccionController@listAll');
    Route::get('respuestas_inspecciones/{id}', 'api\RespuestaInspeccionController@listOne');
    Route::post('respuestas_inspecciones', 'api\RespuestaInspeccionController@create');

    Route::get('botiquines', 'api\BotiquinController@listAll');
    Route::get('botiquines/{id}', 'api\BotiquinController@listOne');
    Route::post('botiquines', 'api\BotiquinController@create');

    Route::get('insumos_botiquin/{id}', 'api\InsumoBotiquinController@listAll');

});