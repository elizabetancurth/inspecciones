@extends("layouts.app")

@section("headerTitle", "Datos del establecimiento")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col col-md-7" >
                <a href="{{ route('establecimientos.index') }}">< Volver a establecimientos</a>
                <br>
                    <h2>{{$establecimiento->nombre}}</h2>
                    <br>
            </div>
            <div class="col col-md-5" >
                {!!QrCode::size(150)->generate(Request::url()); !!}
            </div>
        </div>        
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col col-md-6" >
                
                <h3>Información General </h3>

                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">         
                                Nombre
                            </th>
                            <td>
                                {{$establecimiento->nombre }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <br>

                <h3>Ubicación</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Bloque</th>
                            <th scope="col">Piso</th>
                            <th scope="col">Referencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$establecimiento->ubicacion->edificio->nombre }}</td>
                            <td>{{$establecimiento->ubicacion->piso }}</td>
                            <td>{{$establecimiento->ubicacion->referencia }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection