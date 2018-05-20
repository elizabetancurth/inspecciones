<?php

namespace App\Http\Controllers\api;

use App\Inspeccion;
use App\InspeccionExtintor;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InspeccionExtintorController extends Controller
{
    /**
     * Devuevle el listado de todas las Inspecciones de Extintores que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = InspeccionExtintor::where('estado','Activo')->get();
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
     * Muestra toda la información relacionada con una Inspección de un Extintor específico.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = InspeccionExtintor::findOrFail($id);
            $statusCode = 200;  // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404;  // Not Found
        }

        return response()->json($response, $statusCode);
    }
}
