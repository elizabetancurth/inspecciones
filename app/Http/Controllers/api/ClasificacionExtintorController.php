<?php

namespace App\Http\Controllers\api;

use App\ClasificacionExtintor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClasificacionExtintorController extends Controller
{
    /**
     * Devuevle el listado de todas las clasificaciones de extintor que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = ClasificacionExtintor::where('estado','Activo')->get();
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
            $response = ClasificacionExtintor::findOrFail($id);
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
