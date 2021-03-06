<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Session;
use App\Edificio;
use App\Ubicacion;
use App\TipoBotiquin;
use App\Botiquin;
use App\InsumoBotiquin;
use App\Http\Requests\BotiquinRequest;

class BotiquinController extends Controller
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
        $botiquines = Botiquin::where('estado','Activo')
                                        ->paginate(5);
        return view('botiquines.consultar', ['botiquines'=>$botiquines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edificios = Edificio::pluck('nombre', 'id');
        $tipos_botiquines = TipoBotiquin::pluck('nombre', 'id');
        return view('botiquines.crear', ['edificios' => $edificios, 'tipos_botiquines' => $tipos_botiquines]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BotiquinRequest $request)
    {
        $owner = Auth:: User()->id;

        $input = $request -> all();

        $ubicacion = new Ubicacion;
        $ubicacion -> piso = $input['piso'];
        $ubicacion -> referencia = $input['referencia'];
        $ubicacion -> estado = 'Activo';
        $ubicacion -> edificio_id = $input['edificio'];
        $ubicacion -> user_id_creacion = $owner;
        $ubicacion->save();
        
        $botiquin = new Botiquin;
        $botiquin -> codigo = $input['codigo'];
        $botiquin -> tipo_botiquin_id = $input['tipo_botiquin'];
        $botiquin -> estado = 'Activo';
        $botiquin -> ubicacion_id = $ubicacion->id;
        $botiquin -> user_id_creacion = $owner;
        $botiquin->save();

        Session::flash('flash_message', 'Botiquín creado exitosamente');

        return redirect('/botiquines');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $botiquin = Botiquin::findOrFail($id);
        $insumos_botiquines = InsumoBotiquin::where('botiquin_id', $id)->get();
        return view('botiquines.ver', ['botiquin' => $botiquin, 'insumos_botiquines' => $insumos_botiquines]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $botiquin = Botiquin::findOrFail($id);
        $edificios = Edificio::pluck('nombre', 'id');
        $tipos_botiquines = TipoBotiquin::pluck('nombre', 'id');
        return view('botiquines.editar', ['botiquin' => $botiquin, 
                                            'edificios' => $edificios, 
                                                'tipos_botiquines' => $tipos_botiquines,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BotiquinRequest $request, $id)
    {
        $owner = Auth:: User()->id;
        
        $input = $request->all();
       
        $botiquin = Botiquin::findOrFail($id);
        $botiquin -> codigo = $input['codigo'];
        $botiquin -> tipo_botiquin_id = $input['tipo_botiquin'];
        $botiquin -> user_id_modificacion = $owner;
        $botiquin->save();

        $ubicacion = Ubicacion::findOrFail($botiquin->ubicacion_id);
        $ubicacion -> piso = $input['piso'];
        $ubicacion -> referencia = $input['referencia'];
        $ubicacion -> edificio_id = $input['edificio'];
        $ubicacion -> user_id_modificacion = $owner;
        $ubicacion->save();

        Session::flash('flash_message', 'Botiquín modificado exitosamente');

        return redirect('/botiquines');
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
        $botiquin = Botiquin::findOrFail($id);

        if($botiquin->estado === 'Inactivo')
        {
            $botiquin -> estado = 'Activo';
        }  
        else
        {
            $botiquin -> estado = 'Inactivo';
        }
                
        $botiquin -> user_id_modificacion = $owner;
        $botiquin->save();
        return redirect('/botiquines');
    }

    public function frm_inactivos()
    {
        $botiquines = Botiquin::where('estado', 'Inactivo')->paginate(5);
        return view('botiquines.inactivos', ['botiquines' => $botiquines]);
    }
}
