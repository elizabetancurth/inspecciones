<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;
use Illuminate\Support\Facades\DB;

use Session;
use App\Formato;
use App\Extintor;
use App\Inspeccion;
use App\InspeccionExtintor;
use App\InspeccionBotiquin;
use App\InspeccionEstablecimiento;

class ReportesController extends Controller
{
    public function reporte_extintores()
    {
        return view('reportes.extintores');
    }

    public function generar_reporte_extintor(Request $request)
    {
        $input = $request -> all();

        $fecha_desde = $input['fecha_desde'];
        $fecha_hasta = $input['fecha_hasta'];

       $extintores_inspeccionados = DB::table('inspecciones')
                    ->join('inspecciones_extintores', 'inspecciones.id', '=', 'inspecciones_extintores.inspeccion_id')
                    ->join('extintores', 'extintores.id', '=', 'inspecciones_extintores.extintor_id')
                    ->join('ubicaciones', 'ubicaciones.id', '=', 'extintores.ubicacion_id')
                    ->join('edificios', 'edificios.id', '=', 'ubicaciones.edificio_id')
                    ->join('clasificaciones_extintores', 'clasificaciones_extintores.id', '=', 'extintores.clasificacion_extintor_id')
                    ->where([['inspecciones.fecha', '>=', $fecha_desde],['inspecciones.fecha', '<=', $fecha_hasta],['inspecciones.estado_inspeccion', 'Realizada']])
        ->select('extintores.codigo', 'clasificaciones_extintores.nombre as clasificacion', 'extintores.capacidad', 'edificios.nombre', 'ubicaciones.piso', 'ubicaciones.referencia',
                     'extintores.altura', 'inspecciones.formato_inspeccion_id', 'inspecciones_extintores.inspeccion_id')->get();

        if(count( $extintores_inspeccionados) > 0)
        {
            $preguntas = DB::table('preguntas_formatos')
                        ->where('formato_inspeccion_id', $extintores_inspeccionados[0]->formato_inspeccion_id)
                        ->select('descripcion')->get();

            $respuesta_inpecciones = DB::table('inspecciones')
                        ->join('inspecciones_extintores', 'inspecciones.id', '=', 'inspecciones_extintores.inspeccion_id')
                        ->join('formatos_inspecciones', 'formatos_inspecciones.id', '=', 'inspecciones.formato_inspeccion_id')
                        ->join('preguntas_formatos', 'preguntas_formatos.formato_inspeccion_id', '=', 'formatos_inspecciones.id')
                        ->join('respuestas_inspecciones', [['respuestas_inspecciones.inspeccion_id', '=', 'inspecciones.id'], ['respuestas_inspecciones.pregunta_formato_id', '=', 'preguntas_formatos.id']])
                        ->where([['inspecciones.fecha', '>=', $fecha_desde],['inspecciones.fecha', '<=', $fecha_hasta], ['preguntas_formatos.formato_inspeccion_id', $extintores_inspeccionados[0]->formato_inspeccion_id], ['inspecciones.estado_inspeccion', 'Realizada']])           
            ->select('respuestas_inspecciones.respuesta', 'respuestas_inspecciones.observaciones', 'inspecciones_extintores.inspeccion_id')->get();                      

            return view('reportes.ver_reporte_extintores', ['extintores_inspeccionados' => $extintores_inspeccionados, 'preguntas' => $preguntas, 'respuesta_inpecciones' => $respuesta_inpecciones]);
        }

        return view('reportes.ver_reporte_extintores', ['extintores_inspeccionados' => $extintores_inspeccionados]);
    }
}
