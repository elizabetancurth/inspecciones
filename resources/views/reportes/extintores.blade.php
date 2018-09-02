@extends("layouts.app")

@section("headerTitle", "Reporte Inspección de Extintores")

@section("content")

<a href="/home">< Volver a página principal</a>
<br><br>
<h4>Seleccione periodo:</h4>
<hr>
<div class="table table-light">
    <div class="thead-light">
    {!! Form::open(['route' => 'generar_reporte_inspecciones.extintores']) !!}
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
        <hr>
        <div class="row">
            <div class="col"> 
                <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus form-control-feedback"></i> Generar Reporte
                </button>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</div>
<hr>


@endsection