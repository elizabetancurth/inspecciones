<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

use Session;
use App\Edificio;
use App\Ubicacion;
use App\ClasificacionExtintor;
use App\Extintor;
use App\RecargaExtintor;
use App\Http\Requests\ExtintorRequest;

class ExtintorController extends Controller
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
        $extintores = Extintor::where('estado','Activo')
                                                ->paginate(5);
        return view('extintores.consultar', ['extintores' => $extintores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $edificios = Edificio::pluck('nombre', 'id');
        $clasificaciones_extintores = ClasificacionExtintor::pluck('nombre', 'id');
        return view('extintores.crear', ['edificios' => $edificios, 'clasificaciones' => $clasificaciones_extintores]);
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
        $extintor -> altura = $input['altura'];
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
        $edificios = Edificio::pluck('nombre', 'id');
        $clasificaciones_extintores = ClasificacionExtintor::pluck('nombre', 'id');
        return view('extintores.editar', ['extintor' => $extintor, 
                                            'edificios' => $edificios, 
                                                'clasificaciones' => $clasificaciones_extintores,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExtintorRequest $request, $id)
    {

        $owner = Auth:: User()->id;
        
        $input = $request->all();

        $extintor = Extintor::findOrFail($id);
        $extintor -> codigo = $input['codigo'];
        $extintor -> clasificacion_extintor_id = $input['clasificacion'];
        $extintor -> capacidad = $input['capacidad'];
        $extintor -> altura = $input['altura'];
        $extintor -> user_id_modificacion = $owner;
        $extintor->save();

        $ubicacion = Ubicacion::findOrFail($extintor->ubicacion_id);
        $ubicacion -> piso = $input['piso'];
        $ubicacion -> referencia = $input['referencia'];
        $ubicacion -> edificio_id = $input['edificio'];
        $ubicacion -> user_id_modificacion = $owner;
        $ubicacion->save(); 

        $fechas = RecargaExtintor::findOrFail($id);
        $fechas -> fecha_recarga = $input['fechaRecarga'];
        $fechas -> fecha_vencimiento = $input['fechaVencimiento'];
        $fechas -> user_id_modificacion = $owner;
        $fechas -> save();

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
        $owner = Auth:: User()->id;
        $extintor = Extintor::findOrFail($id);

        if($extintor->estado === 'Inactivo')
        {
            $extintor -> estado = 'Activo';
        }  
        else
        {
            $extintor -> estado = 'Inactivo';
        }
                
        $extintor -> user_id_modificacion = $owner;
        $extintor->save();
        return redirect('/extintores');
    }

    public function frm_inactivos()
    {
        $extintores = Extintor::where('estado', 'Inactivo')->paginate(5);
        return view('extintores.inactivos', ['extintores' => $extintores]);
    }
}
