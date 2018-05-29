<?php

namespace App\Http\Controllers;

use Session;
use App\RespuestaInspeccion;
use App\InspeccionBotiquin;
use App\Inspeccion;
use App\OpcionRespuesta;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

class RespuestaInspeccionBotiquinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner = Auth:: User()->id;
        $input = $request -> all();

        $inspeccion_botiquin = InspeccionBotiquin::findOrFail($input['inspeccion_id']);

        $i=0;

        foreach($inspeccion_botiquin->inspeccion->formato->preguntas as $pregunta)
        {
            $respuesta = new RespuestaInspeccion;
            
            if($pregunta->tipo_pregunta_id === 2)
            {
                $valor = OpcionRespuesta::findOrFail($input['respuesta_'.$i]);
                $respuesta -> respuesta = $valor->nombre;
                $i = $i+1; 
            }
            if($pregunta->tipo_pregunta_id === 3)
            {
                $respuesta -> respuesta = $input['fecha_vencimiento'];
            }
            if($pregunta->tipo_pregunta_id === 4)
            {
                $respuesta -> respuesta = $input['observaciones'];
            }
            $respuesta -> pregunta_formato_id = $pregunta->id;
            $respuesta -> inspeccion_id = $inspeccion_botiquin->inspeccion->id;
            $respuesta -> estado = 'Activo';
            $respuesta -> user_id_creacion = $owner;
            $respuesta -> save();
        }

        $inspeccion = Inspeccion::findOrFail($inspeccion_botiquin->inspeccion_id);
        $inspeccion -> estado_inspeccion = 'Realizada';
        $inspeccion -> user_id_modificacion = $owner;
        $inspeccion -> save();

        Session::flash('flash_message', 'Respuesta guardada exitosamente');
        return redirect('/ver_inspecciones_insumo/'.$inspeccion_botiquin->insumo_botiquin_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspeccion = InspeccionBotiquin::findOrFail($id);
        $respuestas = RespuestaInspeccion::where('inspeccion_id', $inspeccion->inspeccion->id)->get();
        $user = User::findOrFail($inspeccion->inspeccion->user_id_creacion);

        return view('inspecciones_botiquines.ver', ['inspeccion' => $inspeccion, 'respuestas' => $respuestas, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
