@extends("layouts.reportes")

@section("headerTitle", "Reporte Inspección de Extintores")

@section("content")

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Extintor</th>
            <th scope="col">Clasificación</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Bloque</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Altura (cm)</th>
            <!-- @foreach($inspecciones as $pregunta)
                <th scope="col">{{$pregunta -> descripcion}}</th>
            @endforeach -->
        </tr>
    </thead>
    <tbody>
    @foreach($inspecciones as $inspeccion)
        <tr>
            <td>COD {{$inspeccion->codigo}} </td>
            <td>{{$inspeccion->clasificacion}} </td>
            <td>{{$inspeccion->capacidad}} </td>
            <td>{{$inspeccion->nombre}} </td>
            <td>Piso {{$inspeccion->piso}}, {{$inspeccion->referencia}}</td>
            <td>{{$inspeccion->altura}}</td>
            <td>{{$inspeccion->respuesta}}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection