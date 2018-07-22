<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

use Session;
use App\Edificio;
use App\Ubicacion;
use App\Establecimiento;
use App\Http\Requests\EstablecimientoRequest;

class EstablecimientoController extends Controller
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
        $establecimientos = Establecimiento::where('estado','Activo')
                                                ->paginate(5);
        return view('establecimientos.consultar', ['establecimientos' => $establecimientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edificios = Edificio::pluck('nombre', 'id');
        return view('establecimientos.crear', ['edificios' => $edificios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstablecimientoRequest $request)
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

        $establecimiento = new Establecimiento;
        $establecimiento -> nombre = $input['nombre'];
        $establecimiento -> estado = 'Activo';
        $establecimiento -> ubicacion_id = $ubicacion->id;
        $establecimiento -> user_id_creacion = $owner;
        $establecimiento->save();

        return redirect('/establecimientos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $establecimiento = Establecimiento::findOrFail($id);
        return view('establecimientos.ver', ['establecimiento' => $establecimiento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $establecimiento = Establecimiento::findOrFail($id);
        $edificios = Edificio::pluck('nombre', 'id');
        return view('establecimientos.editar', ['establecimiento' => $establecimiento, 
                                                    'edificios' => $edificios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstablecimientoRequest $request, $id)
    {
        $owner = Auth:: User()->id;

        $input = $request -> all();

        $establecimiento = Establecimiento::findOrFail($id);
        $establecimiento -> nombre = $input['nombre'];
        $establecimiento -> user_id_modificacion = $owner;
        $establecimiento->save();

        $ubicacion = Ubicacion::findOrFail($establecimiento->ubicacion_id);
        $ubicacion -> piso = $input['piso'];
        $ubicacion -> referencia = $input['referencia'];
        $ubicacion -> edificio_id = $input['edificio'];
        $ubicacion -> user_id_modificacion = $owner;
        $ubicacion->save();

        return redirect('/establecimientos');
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
        $establecimiento = Establecimiento::findOrFail($id);

        if($establecimiento->estado === 'Inactivo')
        {
            $establecimiento -> estado = 'Activo';
        }  
        else
        {
            $establecimiento -> estado = 'Inactivo';
        }
                
        $establecimiento -> user_id_modificacion = $owner;
        $establecimiento->save();
        return redirect('/establecimientos');
    }

    public function frm_inactivos()
    {
        $establecimientos = Establecimiento::where('estado', 'Inactivo')->paginate(5);
        return view('establecimientos.inactivos', ['establecimientos' => $establecimientos]);
    }
}
