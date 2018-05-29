@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones_extintores.index') }}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección Extintor N° {{$inspeccion->extintor->codigo}}</h2>
    <br>

    <div>Inspección realizada el {{$inspeccion->inspeccion->created_at}}</div>
    <div>Funcionario responsable: {{$user->name}} {{$user->lastname}}</div>
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
                 @if($respuesta->pregunta->tipo_pregunta_id === 2)
                    @if($respuesta->respuesta === 'Bueno')
                    <tr>
                        <td>{{$respuesta->pregunta->descripcion}}</td>
                        <td> {{$respuesta->respuesta}}</td>
                    </tr>
                    @endif
                    @if($respuesta->respuesta === 'Regular')
                    <tr class="warning">
                        <td>{{$respuesta->pregunta->descripcion}}</td>
                        <td> {{$respuesta->respuesta}}</td>
                    </tr>
                    @endif
                    @if($respuesta->respuesta === 'Malo')
                    <tr class="danger">
                        <td>{{$respuesta->pregunta->descripcion}}</td>
                        <td> {{$respuesta->respuesta}}</td>
                    </tr>
                    @endif
                @else
                    <tr>
                        <td>{{$respuesta->pregunta->descripcion}}</td>
                        <td> {{$respuesta->respuesta}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection