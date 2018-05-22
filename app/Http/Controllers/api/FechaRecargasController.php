<?php

namespace App\Http\Controllers\api;

use App\RecargaExtintor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FechaRecargasController extends Controller
{
    /*
    * Devuele el listado de todas las recargas que se encuentran 'Activas' en el sistema.
    */
   public function listAll(Request $request)
   {
       try
       {
           $response = RecargaExtintor::where('estado','Activo')->get();
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
    * Muestra toda la información relacionada con una recarga específica.
    */
   public function listOne(Request $request, $id)
   {
       try
       {
           $response = RecargaExtintor::findOrFail($id);
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
