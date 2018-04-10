@extends("layouts.app")

@section("headerTitle", "Editar extintor")

@section("content")

<a href="{{ route('extintores.index') }}">Volver a extintores</a>
<br>

    {!! Form::model($extintor, [ 
        'method' => 'PUT', 
        'route' => ['extintores.update', $extintor->id]
    ])!!}

    <div class="form-group">
        <table class="container-fluid">
            <thead><th colspan="2"><h4>Información General</h4></th></thead>
            <tbody>
                <tr>
                    <th class="col-md-5">
                        {{ Form::label("codigo", "Código:") }}         
                    </th>
                    <td>
                        {{ Form::text("codigo", $extintor->codigo, ["class" => "container-fluid"]) }}
                    </td>
                </tr>
                <tr>
                    <th class="col-md-5">
                        {{ Form::label("clasificacion", "Clasificación:") }}
                    </th>
                    <td>
                        <select id='clasificacion' name='clasificacion'  class="form-control"  >
                        <option value="" >{{$extintor->clasificacion->nombre}}</option>
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
    <div class="modal-footer">
            {!! Form::submit('Actualizar Extintor', ['class' => 'btn btn-info']) !!}
            {!! Form::close()!!}
    </div>
@endsection