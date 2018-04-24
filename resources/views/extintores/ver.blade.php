@extends("layouts.app")

@section("headerTitle", "Datos del extintor")

@section("content")
<a href="{{ route('extintores.index') }}">< Volver a extintores</a>
<br>
<h2>Extintor N° {{$extintor->codigo}}</h2>
<br>

    <table class="table">
        <tbody>
            <tr>
                <th>         
                    {{ Form::label("clasificacion", "Clasificación:") }}
                </th>
                <td>
                    {{$extintor->clasificacion->nombre }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("capacidad", "Capacidad:") }}
                </th>
                <td>
                    {{$extintor->capacidad}}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="container">
        <div class="col-mod-3">
            <h3>Ubicación</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Edificio</th>
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
        <br>
    </div>

    <div class="container"> 
        <div class="col-mod-3">
            <h3>Historial de recargas:</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha recarga</th>
                </tr>
            </thead>
            <tbody>
            @foreach($recargas_extintores as $recarga_extintor)
                <tr>
                    <td>{{$recarga_extintor->fecha_recarga}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection