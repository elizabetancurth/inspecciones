<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidationRequests;

use Session;
use App\Inspeccion;
use App\InspeccionClasificacion;
use App\InspeccionEstablecimiento;
use App\Formato;
use App\PreguntaFormato;
use App\CategoriaPreguntaFormato;
use App\Establecimiento;
use App\OpcionRespuesta;

class InspeccionEstablecimientoController extends Controller
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
        $inspecciones = InspeccionEstablecimiento::where('estado', 'Activo')->paginate(5);                                                                       
        return view('inspecciones_establecimientos.consultar', ['inspecciones' => $inspecciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formatos = Formato::where('estado','Activo')->get();
        return view('inspecciones_establecimientos.crear', ['formatos' => $formatos]);
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
        $establecimientos = Establecimiento::where('estado', 'Activo')->get();
                
        $input = $request -> all();
        $tipo = 3; //BPM//

        foreach($establecimientos as $establecimiento)
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

            $inspeccion_establecimiento = new InspeccionEstablecimiento;
            $inspeccion_establecimiento -> inspeccion_id = $inspeccion->id;
            $inspeccion_establecimiento -> establecimiento_id = $establecimiento-> id;
            $inspeccion_establecimiento -> estado = 'Activo';
            $inspeccion_establecimiento->save(); 
        }

        return redirect('/inspecciones_establecimientos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspeccion = InspeccionEstablecimiento::findOrFail($id);
        $formato = $inspeccion->inspeccion->formato;
        $categorias_id = PreguntaFormato::distinct()->select('categoria_pregunta_formato_id')->where('formato_inspeccion_id', $formato->id)->pluck('categoria_pregunta_formato_id');
        $categorias = CategoriaPreguntaFormato::whereIn('id', $categorias_id)->get();
        $opcion_respuesta = OpcionRespuesta::all();
        $i = 0;

        if($inspeccion->inspeccion->estado_inspeccion === "Pendiente")
        {
            return view('inspecciones_establecimientos.realizar', ['inspeccion' => $inspeccion, 'categorias' => $categorias, 'opcion_respuesta' => $opcion_respuesta, 'i' => $i]);
        }

        if($inspeccion->inspeccion->estado_inspeccion === "Cancelada")
        {
            return redirect('/inspecciones_establecimientos'); 
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
        $inspeccion_establecimiento = InspeccionEstablecimiento::findOrFail($id);
        $inspeccion = Inspeccion::findOrFail($inspeccion_establecimiento->inspeccion_id);
        
        if($inspeccion -> estado === 'Activo')
        {
            $inspeccion -> estado = 'Inactivo';
            $inspeccion_establecimiento -> estado = 'Inactivo';

            if ($inspeccion->estado_inspeccion === 'Pendiente')
            {
                $inspeccion -> estado_inspeccion = 'Cancelada';
            }
        }  
        else
        {
            $inspeccion -> estado = 'Activo';
            $inspeccion_establecimiento -> estado = 'Activo';

            if ($inspeccion->estado_inspeccion === 'Cancelada')
            {
                $inspeccion -> estado_inspeccion = 'Pendiente';
            }
        }

        $inspeccion -> user_id_modificacion = $owner;

        $inspeccion->save();
        $inspeccion_establecimiento->save();

        return redirect('/inspecciones_establecimientos');
    }

    public function frm_inactivos()
    {
        $inspecciones = InspeccionEstablecimiento::where('estado', 'Inactivo')->paginate(5);                                                                       
        return view('inspecciones_establecimientos.inactivos', ['inspecciones' => $inspecciones]);
    }
}
