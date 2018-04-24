<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Session;
use App\Edificio;
use App\Ubicacion;
use App\ClasificacionExtintor;
use App\Extintor;
use App\RecargaExtintor;
use App\Http\Requests\ExtintorRequest;

class ExtintorController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edificios = Edificio::all();
        $clasificaciones_extintores = ClasificacionExtintor::all();
        $extintores = Extintor::all();
        return view('extintores.consultar', ['edificios' => $edificios, 
                                            'clasificaciones' => $clasificaciones_extintores,
                                            'extintores' => $extintores]);
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
    public function store(ExtintorRequest $request)
    {
        $owner = Auth:: User()->id;

        $input = $request -> all();

        $ubicacion = new Ubicacion();
        $ubicacion -> piso = $input['piso'];
        $ubicacion -> referencia = $input['referencia'];
        $ubicacion -> estado = 'Activo';
        $ubicacion -> edificio_id = $input['edificio'];
        $ubicacion -> user_id_creacion = $owner;
        $ubicacion->save();
        
        $extintor = new Extintor;
        $extintor -> codigo = $input['codigo'];
        $extintor -> clasificacion_extintor_id = $input['clasificacion'];
        $extintor -> capacidad = $input['capacidad'];
        $extintor -> altura = $input['capacidad'];
        $extintor -> estado = 'Activo';
        $extintor -> ubicacion_id = $ubicacion->id;
        $extintor -> user_id_creacion = $owner;
        $extintor->save();

        $fechas = new RecargaExtintor;
        $fechas -> fecha_recarga = $input['fechaRecarga'];
        $fechas -> fecha_vencimiento = $input['fechaVencimiento'];
        $fechas -> extintor_id = $extintor->id;
        $fechas -> estado = 'Activo';
        $fechas -> user_id_creacion = $owner;
        $fechas -> save();

        Session::flash('flash_message', 'Extintor creado exitosamente');

        return redirect('/extintores');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extintor = Extintor::findOrFail($id);
        $recargas_extintores = RecargaExtintor::where('extintor_id', $id)->get();
        return view('extintores.ver', ['extintor' => $extintor,
                                        'recargas_extintores' => $recargas_extintores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   
        $extintor = Extintor::findOrFail($id);
        $edificios = Edificio::all();
        $clasificaciones_extintores = ClasificacionExtintor::all();
        $recarga_extintor = RecargaExtintor::where('extintor_id',$id)->get();
        return view('extintores.editar', ['extintor' => $extintor, 
                                            'edificios' => $edificios, 
                                            'clasificaciones' => $clasificaciones_extintores,
                                                'recarga_extintor' => $recarga_extintor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExtintorRequest $request, Extintor $extintor)
    {
        $input = $request->all();

        $extintor = new Extintor();
        $extintor->fill($input)->save();
       
        Session::flash('flash_message', 'Extintor editado exitosamente!');
        
        return redirect('/extintores');
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
