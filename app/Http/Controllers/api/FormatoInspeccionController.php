<?php

namespace App\Http\Controllers\api;

use App\Formato;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormatoInspeccionController extends Controller
{
    /*
    * Devuevle el listado de todos los formatos que se encuentran 'Activos' en el sistema.
    */
   public function listAll(Request $request)
   {
       try
       {
           $response = Formato::where('estado','Activo')->get();
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
    * Muestra toda la información relacionada con un formato específico.
    */
   public function listOne(Request $request, $id)
   {
       try
       {
           $response = Formato::findOrFail($id);
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
