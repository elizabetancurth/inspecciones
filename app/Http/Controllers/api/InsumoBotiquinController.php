<?php

namespace App\Http\Controllers\api;

use App\Botiquin;
use App\InsumoBotiquin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InsumoBotiquinController extends Controller
{
    /**
     * Devuelve el listado de todos los insumos de un botiquín que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request, $id)
    {
        try
        {
            $botiquin = Botiquin::findOrFail($id);
            $response = InsumoBotiquin::where('botiquin_id',$botiquin->id)->get();
            $statusCode = 200; // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404; // Not Found
        }

        return response()->json($response, $statusCode);
    }

}
