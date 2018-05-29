<?php

namespace App\Http\Controllers\api;

use App\Inspeccion;
use App\InspeccionBotiquin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InspeccionBotiquinController extends Controller
{
        /**
     * Devuelve el listado de todas las Inspecciones de Botiquines que se encuentran en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = InspeccionBotiquin::all();
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
     * Muestra toda la información relacionada con una Inspección de un Botiquín específico.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = InspeccionBotiquin::findOrFail($id);
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
