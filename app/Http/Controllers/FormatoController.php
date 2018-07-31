<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Formato;
use App\PreguntaFormato;
use App\TipoPregunta;
use App\CategoriaPreguntaFormato;
use Session;

class FormatoController extends Controller
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
        $formatos = Formato::where('estado','Activo')
                                                ->paginate(5);
        return view('formatos.consultar', ['formatos' => $formatos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formatos.crear');
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

        $formato = new Formato();
        $formato -> nombre = $input['nombre'];
        $formato -> estado = 'Activo';
        $formato -> user_id_creacion = $owner;
        $formato->save();

        Session::flash('flash_message', 'Formato creado exitosamente');

        return redirect('/formatos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formato = Formato::findOrFail($id);
        return view('formatos.ver', ['formato' => $formato]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formato = Formato::findOrFail($id);
        return view('formatos.editar', ['formato' => $formato]);
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
        $owner = Auth:: User()->id;
        
        $input = $request->all();

        $formato = Formato::findOrFail($id);
        $formato -> nombre = $input['nombre'];
        $formato -> user_id_modificacion = $owner;
        $formato->save();

        Session::flash('flash_message', 'Formato editado exitosamente');

        return redirect('/formatos');

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

        $formato = Formato::findOrFail($id);

        if($formato->estado === 'Inactivo')
        {
            $formato -> estado = 'Activo';
        }  
        else
        {
            $formato -> estado = 'Inactivo';
        }
                
        $formato -> user_id_modificacion = $owner;
        $formato->save();
        return redirect('/formatos');
    }

    public function frm_inactivos()
    {
        $formatos = Formato::where('estado', 'Inactivo')->paginate(5);
        return view('formatos.inactivos', ['formatos' => $formatos]);
    }
}
