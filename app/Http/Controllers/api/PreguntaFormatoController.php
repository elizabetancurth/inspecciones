<?php

namespace App\Http\Controllers\api;

use App\Formato;
use App\PreguntaFormato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreguntaFormatoController extends Controller
{
    /*
    * Devuevle el listado de todas las preguntas de un formato específico.
    * $id es el identificador del formato al que se quiere consultar las preguntas 
    */
   public function listAll(Request $request, $id)
   {
       try
       {
            $formato = Formato::findOrFail($id);
            $response = PreguntaFormato::where('formato_inspeccion_id',$formato->id)->get();
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
