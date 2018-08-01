@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones_botiquines.ver_inspecciones_insumo', $inspeccion->insumo_botiquin->id)}}">< Volver a inspecciones de insumo</a>
    <br>
    <h2>Inspección Insumo {{$inspeccion->insumo_botiquin->nombre}}</h2>
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
                    <th scope="col">Observaciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($respuestas as $respuesta)
                    <tr>
                        <td>{{$respuesta->pregunta->descripcion}}</td>
                        <td>{{$respuesta->respuesta}}</td>
                        <td>{{$respuesta->observaciones}}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection