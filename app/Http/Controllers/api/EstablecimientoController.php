<?php

namespace App\Http\Controllers\api;

use App\Establecimiento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstablecimientoController extends Controller
{
    /**
     * Devuevle el listado de todos los Establecimientos que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = Establecimiento::where('estado','Activo')->get();
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
     * Muestra toda la información relacionada con un Establecimiento específico.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = Establecimiento::findOrFail($id);
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
