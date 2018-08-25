<?php

namespace App\Http\Controllers\api;

use App\Inspeccion;
use App\InspeccionEstablecimiento;
use App\RespuestaInspeccion;
use App\OpcionRespuesta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RespuestaInspeccionEstablecimientoController extends Controller
{


    public function create(Request $request)
    {
        $input = $request -> all();

        $owner = $input['usuario_id'];
        $inspeccion = $input['inspeccion_id']; //Id de la inspección de establecimiento
        
        $inspeccion_establecimiento = InspeccionEstablecimiento::findOrFail($input['inspeccion_id']);

        $i=0;

        try
        {
            foreach($inspeccion_establecimiento->inspeccion->formato->preguntas as $pregunta)
            {
                $respuesta = new RespuestaInspeccion;
                
                /**
                 * Si la pregunta es tipo Cumple/NoCumple.
                 */
                if($pregunta->tipo_pregunta_id === 1)
                {
                    $valor = OpcionRespuesta::findOrFail($input['respuesta_'.$i]);
                    $respuesta -> respuesta = $valor->nombre;
                    $respuesta -> observaciones = $input['observaciones_'.$i];
                    $i = $i+1; 
                }
                
                /**
                 * Si la pregunta es tipo Estado (Bueno-Regular-Malo).
                 */
                if($pregunta->tipo_pregunta_id === 2)
                {
                    $valor = OpcionRespuesta::findOrFail($input['respuesta_'.$i]);
                    $respuesta -> respuesta = $valor->nombre;
                    $respuesta -> observaciones = $input['observaciones_'.$i];
                    $i = $i+1; 
                }

                /**
                 * Si la pregunta es tipo Fecha
                 */
                if($pregunta->tipo_pregunta_id === 3)
                {
                    $respuesta -> respuesta = $input['fecha'];
                    $respuesta -> observaciones = $input['observaciones_'.$i];
                    $i = $i+1;
                }

                /**
                 * Si la pregunta es tipo Abierta.
                */
                if($pregunta->tipo_pregunta_id === 4)
                {
                    $respuesta -> respuesta = $input['abierta'];
                }

                $respuesta -> pregunta_formato_id = $pregunta->id;
                $respuesta -> inspeccion_id = $inspeccion_establecimiento->inspeccion->id;
                $respuesta -> estado = 'Activo';
                $respuesta -> user_id_creacion = $owner;
                $respuesta -> save();
            }

            $inspeccion = Inspeccion::findOrFail($inspeccion_establecimiento->inspeccion_id);
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
