@extends("layouts.app")

@section("headerTitle", "Realizar Inspección de Insumo Botiquín")

@section("content")

    <a href="{{ route('inspecciones_botiquines.ver_inspecciones_insumo', $inspeccion->insumo_botiquin->id)}}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección Botiquín {{$inspeccion->insumo_botiquin->botiquin->codigo}}</h2>
    <h3>Insumo: {{$inspeccion->insumo_botiquin->nombre}}</h3>
    <br>

    <div class="container">

    {!! Form::open(['route' => 'res_inspecciones_botiquines.store']) !!}
    
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                    <th scope="col">Observaciones</th>
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
                                    <option value="{{$opcion->id}}">{{$opcion->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                        <input type="hidden" value="{{$i = $i+1}}">
                        @if($pregunta->tipo_pregunta_id === 3)
                            @if($inspeccion->insumo_botiquin->tipo === 'Fármaco')
                                <input class="form-control" type="date" name="fecha" value="">
                            @endif
                            @if($inspeccion->insumo_botiquin->tipo === 'Utencilio')
                                <input type="hidden" name="fecha" value="0000-00-00">
                                No aplica
                            @endif
                        @endif
                        @if($pregunta->tipo_pregunta_id === 4)
                        <textarea class="form-control" name="abierta"></textarea>
                        @endif
                    </td>
                    <td><textarea class="form-control" name="observaciones_{{$i-1}}"></textarea></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="hidden" name="inspeccion_id" value="{{$inspeccion->id}}">
        <div>
            <a role="button" class="btn btn-secondary" href="{{ route('inspecciones_botiquines.ver_inspecciones_insumo', $inspeccion->insumo_botiquin->id)}}">Cerrar</a>
            <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Guardar Inspección'}}" >
        </div>
    
        {!! Form::close() !!}

    </div>

@endsection