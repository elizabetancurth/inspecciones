<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

use Session;
use App\Inspeccion;
use App\InspeccionClasificacion;
use App\InspeccionBotiquin;
use App\Formato;
use App\Botiquin;
use App\InsumoBotiquin;
use App\OpcionRespuesta;
use App\Http\Requests\ExtintorRequest;

class InspeccionBotiquinController extends Controller
{
    /**
     * Solo para usuarios autenticados
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspecciones = InspeccionBotiquin::where('estado', 'Activo')->get();
        $botiquines = Botiquin::where('estado', 'Activo')->paginate(5);                                                                       
        return view('inspecciones_botiquines.consultar', ['inspecciones' => $inspecciones, 'botiquines' => $botiquines]);
    }

    public function ver_inspeccion($id)
    {
        $botiquin = Botiquin::findOrFail($id);
        $insumos = InsumoBotiquin::where('botiquin_id', $botiquin->id)->paginate(5);
        
        return view('inspecciones_botiquines.ver_insumos', ['insumos' => $insumos, 'botiquin' => $botiquin]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formatos = Formato::where('estado','Activo')->get();
        return view('inspecciones_botiquines.crear', ['formatos' => $formatos]);
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
        $insumos_botiquines = InsumoBotiquin::where('estado', 'Activo')->get();
                
        $input = $request -> all();
        $tipo = 2; //Botiquines//

        foreach($insumos_botiquines as $insumo)
        {
            $inspeccion = new Inspeccion;
            $inspeccion -> fecha = $input['fecha'];
            $inspeccion -> hora = $input['hora'];
            $inspeccion -> inspeccion_clasificacion_id = $tipo;
            $inspeccion -> formato_inspeccion_id = $input['formato'];
            $inspeccion -> estado = 'Activo';
            $inspeccion -> estado_inspeccion = 'Pendiente';
            $inspeccion -> user_id_creacion = $owner;
            $inspeccion->save(); 

            $inspeccion_botiquin = new InspeccionBotiquin;
            $inspeccion_botiquin -> inspeccion_id = $inspeccion->id;
            $inspeccion_botiquin -> insumo_botiquin_id = $insumo-> id;
            $inspeccion_botiquin -> estado = 'Activo';
            $inspeccion_botiquin->save(); 
        }

        return redirect('/inspecciones_botiquines');
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
        $opcion_respuesta = OpcionRespuesta::all();
        $i = 0;

        if($inspeccion->inspeccion->estado_inspeccion === "Pendiente")
        {
            return view('inspecciones_botiquines.realizar', ['inspeccion' => $inspeccion, 'opcion_respuesta' => $opcion_respuesta, 'i' => $i]);
        }

        if($inspeccion->inspeccion->estado_inspeccion === "Cancelada")
        {
            return redirect('/inspecciones_botiquines'); 
        }
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
        $owner = Auth:: User()->id;
        $inspeccion_botiquin = InspeccionBotiquin::findOrFail($id);
        $inspeccion = Inspeccion::findOrFail($inspeccion_botiquin->inspeccion_id);
        
        if($inspeccion -> estado === 'Activo')
        {
            $inspeccion -> estado = 'Inactivo';
            $inspeccion_botiquin -> estado = 'Inactivo';

            if ($inspeccion->estado_inspeccion === 'Pendiente')
            {
                $inspeccion -> estado_inspeccion = 'Cancelada';
            }
        }  
        else
        {
            $inspeccion -> estado = 'Activo';
            $inspeccion_botiquin -> estado = 'Activo';

            if ($inspeccion->estado_inspeccion === 'Cancelada')
            {
                $inspeccion -> estado_inspeccion = 'Pendiente';
            }
        }

        $inspeccion -> user_id_modificacion = $owner;

        $inspeccion->save();
        $inspeccion_botiquin->save();

        return redirect('/inspecciones_botiquines');

    }

    public function frm_inactivos()
    {
        $inspecciones = InspeccionBotiquin::where('estado', 'Inactivo')->paginate(5);                                                                       
        return view('inspecciones_botiquines.inactivos', ['inspecciones' => $inspecciones]);
    }
}
