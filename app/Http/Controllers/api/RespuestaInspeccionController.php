<?php

namespace App\Http\Controllers\api;

use App\Inspeccion;
use App\InspeccionExtintor;
use App\RespuestaInspeccion;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;

class RespuestaInspeccionController extends Controller
{
     /**
     * Devuevle el listado de todas las respuestas a Inspecciones que se encuentran 'Activos' en el sistema.
     */
    public function listAll(Request $request)
    {
        try
        {
            $response = RespuestaInspeccion::where('estado','Activo')->get();
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
     * Muestra toda la información relacionada con una Respuesta a una Inspección específica.
     */
    public function listOne(Request $request, $id)
    {
        try
        {
            $response = RespuestaInspeccion::findOrFail($id);
            $statusCode = 200;  // OK
        }
        catch (ModelNotFoundException $e)
        {
            $response = null;
            $statusCode = 404;  // Not Found
        }

        return response()->json($response, $statusCode);
    }

    public function create(Request $request)
    {
        $input = $request -> all();

        $owner = $input['usuario_id'];
        $inspeccion = $input['inspeccion_id'];
        
        $inspeccion_extintor = InspeccionExtintor::findOrFail($input['inspeccion_id']);

        $i=0;

        try
        {
            foreach($inspeccion_extintor->inspeccion->formato->preguntas as $pregunta)
            {
                $respuesta = new RespuestaInspeccion;
                
                if($pregunta->tipo_pregunta_id === 2)
                {
                    $respuesta -> respuesta = $input['respuesta_'.$i];
                    $i = $i+1; 
                }
                if($pregunta->tipo_pregunta_id === 3)
                {
                    $respuesta -> respuesta = $input['fecha_recarga'];
                }
                if($pregunta->tipo_pregunta_id === 4)
                {
                    $respuesta -> respuesta = $input['observaciones'];
                }
                $respuesta -> pregunta_formato_id = $pregunta->id;
                $respuesta -> inspeccion_id = $inspeccion_extintor->inspeccion->id;
                $respuesta -> estado = 'Activo';
                $respuesta -> user_id_creacion = $owner;
                $respuesta -> save();
            }
    
            $inspeccion = Inspeccion::findOrFail($inspeccion_extintor->inspeccion_id);
            $inspeccion -> estado_inspeccion = 'Realizada';
            $inspeccion -> user_id_modificacion = $owner;
            $inspeccion -> save();

            $response = "ok";
            $statusCode = 200;  // Ok
        }
        catch (QueryException $e)
        {
            $response = null;
            $statusCode = 400;  // Bad Request
        }

        return response()->json($response, $statusCode);
    }
}
