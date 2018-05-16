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
                @foreach($inspeccion->inspeccion->formato->preguntas as $pregunta)
                <tr>
                    <td>{{$pregunta -> descripcion}}</td>
                    <td>
                        <select class="custom-select container-fluid" id="inputGroupSelect01">
                            <option selected>--Seleccione--</option>
                            @foreach($opcion_respuesta as $opcion)
                                @if($pregunta->tipo_pregunta->id === $opcion->tipo_pregunta_id)
                                <option value="{{$opcion->valor}}">{{$opcion->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <a role="button" class="btn btn-secondary" href="#">Cerrar</a>
            <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Guardar Inspección'}}" >
        </div>

    </div>

@endsection