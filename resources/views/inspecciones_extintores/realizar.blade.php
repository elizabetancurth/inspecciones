@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones_extintores.index') }}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección Extintor N° {{$inspeccion->extintor->codigo}}</h2>
    <br>

    <div class="container">

    {!! Form::open(['route' => 'respuestas_inspecciones.store']) !!}
    
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inspeccion->inspeccion->formato->preguntas as $pregunta)
                <tr>
                    <td>{{$pregunta -> descripcion}}</td>
                    <td>
                        @if($pregunta->tipo_pregunta_id === 1 || $pregunta->tipo_pregunta_id === 2)
                            <select class="custom-select container-fluid" id="opcion_respuesta" name="respuesta_{{$i}}">
                                <option selected>--Seleccione--</option>
                                @foreach($opcion_respuesta as $opcion)
                                    @if($pregunta->tipo_pregunta->id === $opcion->tipo_pregunta_id)
                                    <option value="{{$opcion->valor}}">{{$opcion->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                        <input type="hidden" value="{{$i = $i+1}}">
                        @if($pregunta->tipo_pregunta_id === 3)
                            <input class="form-control" type="date" name="fecha_recarga" value="">
                        @endif
                        @if($pregunta->tipo_pregunta_id === 4)
                        <textarea class="form-control" name="observaciones"></textarea>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" name="inspeccion_id" value="{{$inspeccion->id}}">
        <div>
            <a role="button" class="btn btn-secondary" href="/inspecciones_extintores">Cerrar</a>
            <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Guardar Inspección'}}" >
        </div>
    
        {!! Form::close() !!}

    </div>

@endsection