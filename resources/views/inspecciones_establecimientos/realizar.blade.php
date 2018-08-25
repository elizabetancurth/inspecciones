@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones_establecimientos.index') }}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección al establecimiento {{$inspeccion->establecimiento->nombre}}</h2>
    <br>

    <div class="container">

    {!! Form::open(['route' => 'res_inspecciones_establecimientos.store']) !!}
    
    @foreach($categorias as $categoria)
        <br>
        <div class="table table-light">
            <div class="thead-light">
                <div class="row">
                    <h4 class="col col-md-6">{{$categoria->nombre}}</h4>
                    <h4 class="col ">Respuesta</h4>
                    <h4 class="col ">Observaciones</h4>
                </div>
                <hr>
            </div>
            <tbody>

                @foreach($inspeccion->inspeccion->formato->preguntas as $pregunta)
                @if($pregunta-> categoria_pregunta_formato_id === $categoria->id)
                <div class="row">
                    <div class="col col-md-6">{{$pregunta -> descripcion}}</div>
                    <div class="col">
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
                            <input class="form-control" type="date" name="fecha" value="">
                        @endif
                        @if($pregunta->tipo_pregunta_id === 4)
                        <textarea class="form-control" name="abierta"></textarea>
                        @endif
                    </div>
                    <div class="col"><textarea class="form-control" name="observaciones_{{$i-1}}"></textarea></div>
                </div>
                <hr>
                @endif
                @endforeach
            </tbody>
        </div>
    @endforeach

        <input type="hidden" name="inspeccion_id" value="{{$inspeccion->id}}">
        <div>
            <a role="button" class="btn btn-secondary" href="/inspecciones_establecimientos">Cerrar</a>
            <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Guardar Inspección'}}" >
        </div>
    
        {!! Form::close() !!}
    </div>

@endsection