@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones_establecimientos.index') }}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección Establecimiento {{$inspeccion->establecimiento->nombre}}</h2>
    <br>

    <div>Inspección realizada el {{$inspeccion->inspeccion->created_at}}</div>
    <div>Funcionario responsable: {{$user->name}} {{$user->lastname}}</div>
    <br>

    <div class="container">

    @foreach($categorias as $categoria)
        <div class="table table-light">
            <div class="thead-light">
                <div class="row">
                    <h4 class="col col-md-6">{{$categoria->nombre}}</h4>
                    <h4 class="col text-center">Respuesta</h4>
                    <h4 class="col">Observaciones</h4>
                </tr>
                <hr>
            </div>
            <hr>
            <tbody>
            @foreach($respuestas as $respuesta)
            @if($respuesta->pregunta-> categoria_pregunta_formato_id === $categoria->id)
            <div class="row">
                <div class="col col-md-6">{{$respuesta->pregunta->descripcion}}</div>
                <div class="col text-center">{{$respuesta->respuesta}}</div>
                <div class="col">{{$respuesta->observaciones}}</div>
            </div>
            <hr>
            @endif
            @endforeach
            </tbody>
        </div>
        <br>
    @endforeach
    </div>
@endsection