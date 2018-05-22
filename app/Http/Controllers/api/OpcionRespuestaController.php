<?php

namespace App\Http\Controllers\api;

use App\OpcionRespuesta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpcionRespuestaController extends Controller
{
     /*
    * Devuelve el listado de todos las opciones de respuesta que se encuentran 'Activos' en el sistema.
    */
   public function listAll(Request $request)
   {
       try
       {
           $response = OpcionRespuesta::where('estado','Activo')->get();
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
    * Muestra toda la información relacionada con una opción de respuesta específica.
    */
   public function listOne(Request $request, $id)
   {
       try
       {
           $response = OpcionRespuesta::findOrFail($id);
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
