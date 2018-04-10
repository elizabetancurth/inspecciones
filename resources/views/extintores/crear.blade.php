@extends('layouts.app')

@section('content')
<div class="container">
    <div class="contenido">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="encabezado">Crear Extintor</div>
                    </div>
                    {!! Form::open(['route' => 'extintores.store']) !!}
                    <div class="form-group">
                        <table class="container-fluid">
                            <thead><th colspan="2"><h4>Información General</h4></th></thead>
                            <tbody>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("codigo", "Código:") }}         
                                    </th>
                                    <td>
                                        {{ Form::text("codigo", "", ["class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("clasificacion", "Clasificación:") }}
                                    </th>
                                    <td>
                                        <select id='clasificacion' name='clasificacion'  class="form-control"  >
                                            <option value="" >Seleccione la clasificación</option>
                                            <?php 
                                                $options = "";

                                                foreach ($clasificaciones as $key => $value)
                                                {
                                                    $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                                                }
                                                echo $options;
                                            ?>
                                        </select>
                                    </td>
                                <tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("capacidad", "Capacidad (Kg):") }}
                                    </th>
                                    <td>
                                        {{ Form::number("capacidad", null, ["step" => "0.01", "class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <h4>Ubicación</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("bloque", "Bloque:") }}
                                    </th>
                                    <td>
                                    <select id='edificio' name='edificio'  class="form-control"  >
                                        <option value="" >Seleccione el Edificio</option>
                                        <?php 
                                            $options = "";

                                            foreach ($edificios as $key => $value)
                                            {
                                                $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                                            }
                                            echo $options;
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("piso", "Piso:") }}
                                    </th>
                                    <td>
                                        <select class="form-control" id="piso">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("altura", "Altura (m):") }}
                                    </th>
                                    <td>
                                        {{ Form::text("altura", "", ["class" => "container-fluid"]) }}<br>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-4">
                                        {{ Form::label("referencia", "Referencia:") }}
                                    </th>
                                    <td>
                                        {{ Form::text("referencia", "", ["class" => "container-fluid"]) }}<br>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <h4>Fechas</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("fechaRecarga", "Fecha de Recarga:") }}
                                    </th>
                                    <td>
                                        {{ Form::date("fechaRecarga", \Carbon\Carbon::now(), ["class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("fechaVencimiento", "Fecha de Vencimiento:") }}
                                    </th>
                                    <td>
                                        {{ Form::date("fechaVencimiento", \Carbon\Carbon::now(), ["class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>                    	
                </div>
            </div>
            <div class="modal-footer">
            {!! Form::submit('Crear Publicación', ['class' => 'btn btn-primary']) !!}
            {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection