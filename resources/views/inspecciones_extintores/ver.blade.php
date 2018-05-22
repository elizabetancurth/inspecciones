@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones_extintores.index') }}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección Extintor N° {{$inspeccion->extintor->codigo}}</h2>
    <br>

    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($respuestas as $respuesta)
                <tr>
                    <td>{{$respuesta->pregunta->descripcion}}</td>
                    <td>
                        {{$respuesta->respuesta}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection