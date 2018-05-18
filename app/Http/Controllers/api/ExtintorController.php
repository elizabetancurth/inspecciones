<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

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
    public function create(Request $request)
    {
        $input = $request->all();

        try
        {
            $response = Extintor::create($input);
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
