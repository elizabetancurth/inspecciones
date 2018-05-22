<?php

namespace App\Http\Controllers\api;

use App\PreguntaFormato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreguntaFormatoController extends Controller
{
    /*
    * Devuevle el listado de todos los preguntas de un formato que se encuentran 'Activos' en el sistema.
    */
   public function listAll(Request $request)
   {
       try
       {
           $response = PreguntaFormato::where('estado','Activo')->get();
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
    * Muestra toda la información relacionada con una pregunta específica.
    */
   public function listOne(Request $request, $id)
   {
       try
       {
           $response = PreguntaFormato::findOrFail($id);
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
