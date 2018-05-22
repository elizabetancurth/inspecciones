@extends("layouts.app")

@section("headerTitle", "Perfil de Usuario")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col col-md-7" >
                    <h2>Perfil de {{Auth::user()->name}}</h2>
                    <br>
            </div>
        </div>        
    </div>
    
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
                                {{Auth::user()->name }} {{Auth::user()->lastname }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Correo Electrónico
                            </th>
                            <td>
                                {{Auth::user()->email}}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Rol
                            </th>
                            <td>
                                {{Auth::user()->rol}}
                            </td>
                        </tr>
                    </tbody>
                </table>
    </div>
@endsection