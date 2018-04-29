@extends('layouts.app')

@section("headerTitle", "Crear Extintor")

@section('content')

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <h6>[Error] Por favor valida los siguientes campos:</h6>
            <hr>
            @foreach ($errors->all() as $error)
                <strong>-></strong> {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'extintores.store']) !!}
        <div class="container col-md-10">
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Información General</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr><th>{{ Form::label("codigo", "Código:") }}</th><td>{{ Form::text("codigo", "", ["class" => "container-fluid form-control"]) }}</td></tr>
                    <tr><th>{{ Form::label("clasificacion", "Clasificación:") }}</th><td><select id='clasificacion' name='clasificacion'  class="form-control"  >
                            <option value="" >--Seleccione--</option>
                            <?php 
                                $options = "";

                                foreach ($clasificaciones as $key => $value)
                                {
                                    $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                                }
                                echo $options;
                            ?>
                        </select></td></tr>
                    <tr><th>{{ Form::label("capacidad", "Capacidad (Kg):") }}</th><td>{{ Form::number("capacidad", '', ["step" => "0.01", "class" => "container-fluid form-control"]) }}</td></tr>
                    <tr><th>{{ Form::label("fechaRecarga", "Fecha de Recarga:") }}</th><td>{{ Form::date("fechaRecarga", \Carbon\Carbon::now(), ["class" => "container-fluid form-control"]) }}</td></tr> 
                    <tr><th>{{ Form::label("fechaVencimiento", "Fecha de Vencimiento:") }}</th><td>{{ Form::date("fechaVencimiento", \Carbon\Carbon::now(), ["class" => "container-fluid form-control"]) }}</td></tr> 
                </tbody>
            </table><br>
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Ubicación</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr><th>{{ Form::label("bloque", "Bloque:") }}</th><td><select id='edificio' name='edificio'  class="form-control"  >
                                                                                <option value="" >--Seleccione--</option>
                                                                                <?php 
                                                                                    $options = "";

                                                                                    foreach ($edificios as $key => $value)
                                                                                    {
                                                                                        $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                                                                                    }
                                                                                    echo $options;
                                                                                ?>
                                                                            </select></td></tr>
                    <tr><th>{{ Form::label("piso", "Piso:") }}</th><td>{{ Form::select( "piso"
                                                                                        ,["S" => "--Seleccione--", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5"]
                                                                                        ,null
                                                                                        ,["class" => "container-fluid form-control"]) }}</td></tr> 
                    <tr><th>{{ Form::label("altura", "Altura (m):") }}</th><td>{{ Form::text("altura", "", ["class" => "container-fluid form-control"]) }}</td></tr> 
                    <tr><th>{{ Form::label("referencia", "Referencia:") }}</th><td>{{ Form::text("referencia", "", ["class" => "container-fluid form-control"]) }}<br></td></tr> 
                </tbody>
            </table><br>
            <div>
                <a role="button" class="btn btn-secondary" href="{{ route('extintores.index') }}">Cerrar</a>
                {!! Form::submit('Crear Extintor', ['class' => 'btn btn-info']) !!}
            </div>
        </div>
        
    {!! Form::close() !!}
@endsection