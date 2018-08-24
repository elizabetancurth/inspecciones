<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Requests\ExtintorRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;

use App\Edificio;
use App\Ubicacion;
use App\ClasificacionExtintor;
use App\Extintor;
use App\RecargaExtintor;
use App\Http\Controllers\Controller;


class ExtintorController extends Controller
{
    

    /**
     * Devuevle el listado de todos los extintores que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = Extintor::where('estado','Activo')->get();
            $statusCode = 200; // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404; // Not Found
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Muestra toda la información relacionada con un Extintor específico.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = Extintor::findOrFail($id);
            $statusCode = 200;  // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404;  // Not Found
        }

        return response()->json($response, $statusCode);
    }

    /**
     * Permite crear un nuevo extintor en el sistema.
     */
    public function create(ExtintorRequest $request)
    {      
        try
        {
            $input = $request -> all();

            $owner = $input['id_usuario'];
            
            $ubicacion = new Ubicacion();
            $ubicacion -> piso = $input['piso'];
            $ubicacion -> referencia = $input['referencia'];
            $ubicacion -> estado = 'Activo';
            $ubicacion -> edificio_id = $input['edificio'];
            $ubicacion -> user_id_creacion = $owner;
            $ubicacion->save();
            
            $extintor = new Extintor;
            $extintor -> codigo = $input['codigo'];
            $extintor -> clasificacion_extintor_id = $input['clasificacion'];
            $extintor -> capacidad = $input['capacidad'];
            $extintor -> altura = $input['altura'];
            $extintor -> estado = 'Activo';
            $extintor -> ubicacion_id = $ubicacion->id;
            $extintor -> user_id_creacion = $owner;
            $extintor->save();

            $fechas = new RecargaExtintor;
            $fechas -> fecha_recarga = $input['fechaRecarga'];
            $fechas -> fecha_vencimiento = $input['fechaVencimiento'];
            $fechas -> extintor_id = $extintor->id;
            $fechas -> estado = 'Activo';
            $fechas -> user_id_creacion = $owner;
            $fechas -> save();

            $response = 'ok';
            $statusCode = 200;  // OK
        }
        catch (QueryException $e)
        {
            $response = null;
            $statusCode = 400;  // Bad Request
        }

        return response()->json($response, $statusCode);
    }
}
