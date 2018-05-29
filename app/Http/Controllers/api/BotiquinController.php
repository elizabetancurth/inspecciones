<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;

use App\Edificio;
use App\Ubicacion;
use App\TipoBotiquin;
use App\Botiquin;
use App\InsumoBotiquin;
use App\Http\Controllers\Controller;

class BotiquinController extends Controller
{
    /**
     * Devuelve el listado de todos los botiquines que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = Botiquin::where('estado','Activo')->get();
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
     * Muestra toda la información relacionada con un Botiquin específico.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = Botiquin::findOrFail($id);
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
