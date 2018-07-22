<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Session;
use App\Botiquin;
use App\InsumoBotiquin;
use App\Http\Requests\InsumoBotiquinRequest;

class InsumoBotiquinController extends Controller
{
    
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

    public function create_insumo($id)
    {
        $botiquin = Botiquin::findOrFail($id);
        return view('botiquines.insumos_botiquin.crear', ['botiquin' => $botiquin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsumoBotiquinRequest $request)
    {   
        
        $owner = Auth:: User()->id;

        $input = $request -> all();

        $insumo_botiquin = new InsumoBotiquin;
        $insumo_botiquin -> nombre = $input['nombre'];
        $insumo_botiquin -> tipo = $input['tipo'];
        $insumo_botiquin -> fecha_vencimiento = $input['fechaVencimiento'];
        $insumo_botiquin -> cantidad = $input['cantidad'];
        $insumo_botiquin -> botiquin_id = $input['botiquin_id'];
        $insumo_botiquin -> estado = 'Activo';
        $insumo_botiquin -> user_id_creacion = $owner;
        $insumo_botiquin->save();

        Session::flash('flash_message', 'Insumo creado exitosamente');

        return redirect('/botiquines/'.$input['botiquin_id']);
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
        $insumo_botiquin = InsumoBotiquin::findOrFail($id);
        $botiquin = Botiquin::where('id', $insumo_botiquin->botiquin_id)->get();
        return view('botiquines.insumos_botiquin.editar', ['insumo_botiquin' => $insumo_botiquin, 'botiquin'=> $botiquin]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsumoBotiquinRequest $request, $id)
    {
        $owner = Auth:: User()->id;
        
        $input = $request->all();

        $insumo_botiquin = InsumoBotiquin::findOrFail($id);
        $insumo_botiquin -> nombre = $input['nombre'];
        $insumo_botiquin -> tipo = $input['tipo'];
        $insumo_botiquin -> fecha_vencimiento = $input['fechaVencimiento'];
        $insumo_botiquin -> cantidad = $input['cantidad'];
        $insumo_botiquin -> user_id_modificacion = $owner;
        $insumo_botiquin->save();

        Session::flash('flash_message', 'Insumo modificado exitosamente');

        return redirect('/botiquines/'.$input['botiquin_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo_botiquin = InsumoBotiquin::findOrFail($id);
        $insumo_botiquin -> delete();

        Session::flash('flash_message', 'Insumo eliminado exitosamente');
        return redirect()->back();
    }
}
