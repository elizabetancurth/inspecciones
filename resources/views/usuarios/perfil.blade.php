@extends("layouts.app")

@section("headerTitle", "Perfil de Usuario")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col col-md-7" >
                    <h2>Perfil de {{$user->name}}</h2>
                    
            </div>
        </div>        
    </div>

    <a href="/">< Volver al inicio</a>
    <br><br>
    
    <div class="container">
        <div class="row">
            <div class="col col-md-10" >
                
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">         
                                Nombre completo
                            </th>
                            <td>
                                {{$user->name }} {{$user->lastname }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Correo Electrónico
                            </th>
                            <td>
                                {{$user->email}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Rol
                            </th>
                            <td>{{$user->rol}}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <a class="btn btn-info" href="{{ route('usuarios.editar_perfil', $user->id) }}">Editar Mi Perfil</span></a>
                    </div>
                </div>
    </div>
@endsection