@extends("layouts.reportes")

@section("headerTitle", "Reporte Inspección de Extintores")

@section("content")

<a href="{{ route('reporte_inspecciones.extintores') }}">< Volver</a>
<br>

@if(count($extintores_inspeccionados) > 0)
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" class="align-middle">Extintor</th>
            <th scope="col" class="align-middle">Clasificación</th>
            <th scope="col" class="align-middle">Capacidad</th>
            <th scope="col" class="align-middle">Bloque</th>
            <th scope="col" class="align-middle">Piso</th>
            <th scope="col" class="align-middle">Ubicación</th>
            <th scope="col" class="align-middle">Altura (cm)</th>
            @foreach($preguntas as $pregunta)
                <th scope="col" class="align-middle">{{$pregunta->descripcion}}</th>
                <th scope="col" class="align-middle">Observación</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    @foreach($extintores_inspeccionados as $inspeccion)
        <tr>
            <td>COD {{$inspeccion->codigo}} </td>
            <td>{{$inspeccion->clasificacion}} </td>
            <td>{{$inspeccion->capacidad}} lb</td>
            <td>{{$inspeccion->nombre}}</td>
            <td>{{$inspeccion->piso}}</td>
            <td>{{$inspeccion->referencia}}</td>
            <td>{{$inspeccion->altura}}</td>
            @foreach($respuesta_inpecciones as $respuesta)
                @if($respuesta->inspeccion_id === $inspeccion->inspeccion_id)
                    <td>{{$respuesta->respuesta}}</td>
                    @if($respuesta->observaciones === NULL)
                        <td>--</td>
                    @else
                        <td>{{$respuesta->observaciones}}</td>
                    @endif
                @endif
            @endforeach
            
        </tr>
    @endforeach
    </tbody>
</table>
@else
<div class="alert alert-danger">
            <strong>¡Atención!</strong> No existen inspecciones en el rango de fecha indicado.
        </div>
@endif

@endsection