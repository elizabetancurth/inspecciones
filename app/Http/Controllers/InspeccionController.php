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
use App\Botiquin;
use App\Establecimiento;
use App\RecargaExtintor;
use App\Http\Requests\ExtintorRequest;

class InspeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspecciones = Inspeccion::where('estado','Activo')
                                                ->paginate(5);                                       
                                                
        return view('inspecciones.consultar', ['inspecciones' => $inspecciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clasificaciones = InspeccionClasificacion::all();
        $formatos = Formato::where('estado','Activo')->get();
        return view('inspecciones.crear', ['formatos' => $formatos, 
                                            'clasificaciones' => $clasificaciones]);
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
        $botiquines = Botiquin::where('estado', 'Activo')->get();
        
        $input = $request -> all();
        $tipo = $input['clasificacion']; 

        if( $tipo === '1' )
        {
            foreach($extintores as $extintor)
            {
                $inspeccion = new Inspeccion;
                $inspeccion -> fecha = $input['fecha'];
                $inspeccion -> hora = $input['hora'];
                $inspeccion -> inspeccion_clasificacion_id = $input['clasificacion'];
                $inspeccion -> id_elemento = $extintor->id;
                $inspeccion -> formato_inspeccion_id = $input['formato'];
                $inspeccion -> estado = 'Activo';
                $inspeccion -> user_id_creacion = $owner;
                $inspeccion->save(); 
            }
        }

        if( $tipo === '2' )
        {
            foreach($botiquines as $botiquin)
            {
                $inspeccion = new Inspeccion;
                $inspeccion -> fecha = $input['fecha'];
                $inspeccion -> hora = $input['hora'];
                $inspeccion -> inspeccion_clasificacion_id = $input['clasificacion'];
                $inspeccion -> id_elemento = $botiquin->id;
                $inspeccion -> formato_inspeccion_id = $input['formato'];
                $inspeccion -> estado = 'Activo';
                $inspeccion -> user_id_creacion = $owner;
                $inspeccion->save(); 
            }
        }

        return redirect('/inspecciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
