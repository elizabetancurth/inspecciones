<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
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
        $usuarios = User::where('estado', 'Activo')->paginate(5);
        return view('usuarios.consultar', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
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
        $data = $request->all();

        $usuario = new User;
        $usuario -> name = $data['name'];
        $usuario -> lastname = $data['lastname'];
        $usuario -> email = $data['email'];
        $usuario -> password = Hash::make($data['password']);
        $usuario -> rol = $data['rol'];
        $usuario -> estado = 'Activo';
        $usuario -> user_id_creacion = $owner;
        $usuario -> save();

        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.ver', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.editar', ['usuario' => $usuario]);
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
        $data = $request->all();

        $usuario = User::findOrFail($id);
        $usuario -> name = $data['name'];
        $usuario -> lastname = $data['lastname'];
        $usuario -> email = $data['email'];
        $usuario -> password = Hash::make($data['password']);
        $usuario -> rol = $data['rol'];
        $usuario -> estado = $data['estado'];
        $usuario -> user_id_modificacion = $owner;
        $usuario -> save();

        return redirect('/usuarios');
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

    public function frm_inactivos()
    {
        $usuarios = User::where('estado', 'Inactivo')->paginate(5);
        return view('usuarios.inactivos', ['usuarios' => $usuarios]);
    }


    public function ver_perfil($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.perfil', ['user' => $user]);
    }

    public function editar_perfil($id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.editar_perfil', ['usuario' => $usuario]);
    }

    public function frm_editar_perfil(Request $request, $id)
    {
        $owner = Auth:: User()->id;
        $data = $request->all();

        $usuario = User::findOrFail($id);
        $usuario -> name = $data['name'];
        $usuario -> lastname = $data['lastname'];
        $usuario -> email = $data['email'];
        $usuario -> password = Hash::make($data['password']);
        $usuario -> user_id_modificacion = $owner;
        $usuario -> save();

        return ('/mi_permil/'. Auth:: User()->id);
    }
}
