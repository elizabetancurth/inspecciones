@extends("layouts.reportes")

@section("headerTitle", "Reporte Inspección de Extintores")

@section("content")

<a href="/home">< Volver a página principal</a>
<br><br>
<h4>Seleccione periodo:</h4>
<hr>
<div class="table table-light">
    <div class="thead-light">
        <div class="row"> 
            <div class="col col-md-3"> 
                {{ Form::label('desde', 'Desde: ') }} 
                {{ Form::date('fecha_desde', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>
            <div class="col col-md-3"> 
                {{ Form::label('hasta', 'Hasta: ') }} 
                {{ Form::date('fecha_hasta', \Carbon\Carbon::now(), ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
</div>
<hr>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Extintor</th>
            @foreach($formato->preguntas as $pregunta)
                <th scope="col">{{$pregunta -> descripcion}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    @foreach($extintores as $extintor)
        <tr>
            <td>{{$extintor->codigo}} </td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection