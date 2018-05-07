@extends("layouts.app")

@section("headerTitle", "Datos del extintor")

@section("content")

    <div class"container">
        <div class="row">
            <div class="col col-md-7" >
            <a href="{{ route('extintores.index') }}">< Volver a extintores</a>
            <br>
                <h2>Extintor N° {{$extintor->codigo}}</h2>
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
                                Clasificación
                            </th>
                            <td>
                                {{$extintor->clasificacion->nombre }}
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">
                                Capacidad
                            </th>
                            <td>
                                {{$extintor->capacidad}}
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
                            <th scope="col">Altura</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$extintor->ubicacion->edificio->nombre }}</td>
                            <td>{{$extintor->ubicacion->piso }}</td>
                            <td>{{$extintor->ubicacion->referencia }}</td>
                            <td>{{$extintor->altura }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            

            <div class="col col-md-6"> 
                <h3>Historial de Recargas</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="col">Fecha recarga</th>
                        </tr>
                        @foreach($recargas_extintores as $recarga_extintor)
                            <tr>
                                <td>{{$recarga_extintor->fecha_recarga}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection