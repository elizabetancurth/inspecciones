<?php

namespace App\Http\Controllers\api;

use App\Inspeccion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InspeccionController extends Controller
{
    /**
     * Devuevle el listado de todas las Inspecciones que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = Inspeccion::where('estado','Activo')->get();
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
     * Muestra toda la información relacionada con una Inspección específica.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = Inspeccion::findOrFail($id);
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
