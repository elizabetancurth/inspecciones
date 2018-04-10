<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Session;
use App\Botiquin;
use App\InsumoBotiquin;
use App\Http\Requests\ExtintorRequest;

class InsumoBotiquinController extends Controller
{
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $owner = Auth:: User()->id;

        $input = $request -> all();

        $insumo_botiquin = new InsumoBotiquin;
        $insumo_botiquin -> nombre = $input['nombre'];
        $insumo_botiquin -> tipo = $input['tipo'];
        $insumo_botiquin -> fecha_vencimiento = $input['fechaVencimiento'];
        $insumo_botiquin -> cantidad = $input['cantidad'];
        $insumo_botiquin -> botiquin_id = $id;
        $insumo_botiquin -> estado = 'Activo';
        $insumo_botiquin -> user_id_creacion = $owner;
        $insumo_botiquin->save();

        Session::flash('flash_message', 'Insumo creado exitosamente');

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
