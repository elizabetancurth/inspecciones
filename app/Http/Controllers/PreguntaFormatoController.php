<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Formato;
use App\PreguntaFormato;
use App\TipoPregunta;
use Session;

class PreguntaFormatoController extends Controller
{
    
    /**
     * Solo parar usuarios autenticados
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

    public function create_pregunta($id)
    {
        $formato = Formato::findOrFail($id);
        $tipos_preguntas = TipoPregunta::All();
        return view('formatos.preguntas.crear', ['formato' => $formato, 'tipos_preguntas' => $tipos_preguntas]);
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

        $pregunta = new PreguntaFormato();
        $pregunta -> descripcion = $input['descripcion'];
        $pregunta -> tipo_pregunta_id = $input['tipo_pregunta'];
        $pregunta -> formato_inspeccion_id = $input['formato_id'];
        $pregunta -> estado = 'Activo';
        $pregunta -> user_id_creacion = $owner;
        $pregunta->save();

        Session::flash('flash_message', 'Pregunta creada exitosamente');

        return redirect('/formatos/'. $input['formato_id']);
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
         try
         {
             $pregunta = PreguntaFormato::findOrFail($id);
             $tipos_preguntas = TipoPregunta::All();
             return view('formatos.preguntas.editar', ['pregunta' => $pregunta, 'tipos_preguntas' => $tipos_preguntas]);
         }
         catch(ModelNotFoundException $e)
         {
             Session::flash('flash_message', "No se encuentra la pregunta");
             return redirect()->back();
         }
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
        try
        {
            $owner = Auth:: User()->id; 

            $pregunta = PreguntaFormato::findOrFail($id);

            $input = $request->all();
            
            $pregunta -> descripcion = $input['descripcion'];
            $pregunta -> tipo_pregunta_id = $input['tipo_pregunta'];
            $pregunta -> user_id_modificacion = $owner;
            $pregunta->save();

            Session::flash('flash_message', "Pregunta actualizada correctamente");
            return redirect('/formatos/'.$input['formato_id']);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "No se eactualizo la pregunta");
             return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pregunta = PreguntaFormato::findOrFail($id);
        $pregunta -> delete();

        Session::flash('flash_message', 'Pregunta exitosamente');
        return redirect()->back();
    }
}
