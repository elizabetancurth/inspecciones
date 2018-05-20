<?php

namespace App\Http\Controllers\api;

use App\Edificio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EdificioController extends Controller
{
    /**
     * Devuevle el listado de todos los Edificios que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = Edificio::where('estado','Activo')->get();
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
     * Muestra toda la información relacionada con un Edificio específico.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = Edificio::findOrFail($id);
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
