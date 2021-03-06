<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

use Session;
use App\Inspeccion;
use App\InspeccionClasificacion;
use App\InspeccionExtintor;
use App\Formato;
use App\Extintor;
use App\RecargaExtintor;
use App\OpcionRespuesta;
use App\Http\Requests\ExtintorRequest;

class InspeccionExtintorController extends Controller
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
        $inspecciones = InspeccionExtintor::where('estado', 'Activo')->paginate(5);                                                                       
        return view('inspecciones_extintores.consultar', ['inspecciones' => $inspecciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formatos = Formato::where('estado','Activo')->get();
        return view('inspecciones_extintores.crear', ['formatos' => $formatos]);
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
        $extintores = Extintor::where('estado', 'Activo')->get();
                
        $input = $request -> all();
        $tipo = 1; //Extintores//

        foreach($extintores as $extintor)
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

            $inspeccion_extintor = new InspeccionExtintor;
            $inspeccion_extintor -> inspeccion_id = $inspeccion->id;
            $inspeccion_extintor -> extintor_id = $extintor-> id;
            $inspeccion_extintor -> estado = 'Activo';
            $inspeccion_extintor->save(); 
        }

        return redirect('/inspecciones_extintores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspeccion = InspeccionExtintor::findOrFail($id);
        $opcion_respuesta = OpcionRespuesta::all();
        $i = 0;

        if($inspeccion->inspeccion->estado_inspeccion === "Pendiente")
        {
            return view('inspecciones_extintores.realizar', ['inspeccion' => $inspeccion, 'opcion_respuesta' => $opcion_respuesta, 'i' => $i]);
        }

        if($inspeccion->inspeccion->estado_inspeccion === "Cancelada")
        {
            return redirect('/inspecciones_extintores'); 
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
        $inspeccion_extintor = InspeccionExtintor::findOrFail($id);
        $inspeccion = Inspeccion::findOrFail($inspeccion_extintor->inspeccion_id);
        
        if($inspeccion -> estado === 'Activo')
        {
            $inspeccion -> estado = 'Inactivo';
            $inspeccion_extintor -> estado = 'Inactivo';

            if ($inspeccion->estado_inspeccion === 'Pendiente')
            {
                $inspeccion -> estado_inspeccion = 'Cancelada';
            }
        }  
        else
        {
            $inspeccion -> estado = 'Activo';
            $inspeccion_extintor -> estado = 'Activo';

            if ($inspeccion->estado_inspeccion === 'Cancelada')
            {
                $inspeccion -> estado_inspeccion = 'Pendiente';
            }
        }

        $inspeccion -> user_id_modificacion = $owner;

        $inspeccion->save();
        $inspeccion_extintor->save();

        return redirect('/inspecciones_extintores');

    }

    public function frm_inactivos()
    {
        $inspecciones = InspeccionExtintor::where('estado', 'Inactivo')->paginate(5);                                                                       
        return view('inspecciones_extintores.inactivos', ['inspecciones' => $inspecciones]);
    }
}
