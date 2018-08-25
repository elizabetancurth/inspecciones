<?php

namespace App\Http\Controllers\api;

use App\Inspeccion;
use App\InspeccionEstablecimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InspeccionEstablecimientoController extends Controller
{
    /**
     * Devuele el listado de todas las Inspecciones de Establecimientos en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = InspeccionEstablecimiento::all();
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
            $response = InspeccionEstablecimiento::findOrFail($id);
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
