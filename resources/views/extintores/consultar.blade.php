@extends("layouts.app")

@section("headerTitle", "Gestión de Extintores")

@section("content")

    <button type="button" class="btn btn-info container-fluid" data-toggle="modal" data-target="#crearModal">
        Crear
    </button>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Listado General de Extintores</h2></div>
        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fecha de Creación</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach($extintores as $extintor)
                <tr>
                    <td>{{$extintor->codigo}}</td>
                    <td>{{$extintor->clasificacion->nombre}}</td>
                    <td>{{$extintor->created_at}}</td>
                    <td>{{$extintor->estado}}</td>
                    <td><a class="text-muted" href="{{ route('extintores.show', $extintor->id) }}"><span class="oi oi-eye"></span></a></td>
                    <td><a class="text-muted" href="{{ route('extintores.edit', $extintor->id) }}"><span class="oi oi-pencil"></span></a></td>
                    <td><a class="text-muted" data-toggle="modal" data-target="#modalConfirmarBorrado" href=""><span class="oi oi-x"></span></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Inicio</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Final</a></li>
        </ul>
    </nav>

    <!-- Modal Crear -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="crearModalLabel">Crear Extintor</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
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
                                        {{ Form::select( "piso"
                                            ,["S" => "--Seleccione--", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5"]
                                            ,null
                                            ,["class" => "container-fluid"]) }}
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            {!! Form::submit('Crear Extintor', ['class' => 'btn btn-info']) !!}
            {!! Form::close()!!}
            </div>
            </div>
        </div>
    </div>
    <!-- End Crear Modal -->

    <!-- Modal Confirmación Borrado -->
    <div class="modal fade" id="modalConfirmarBorrado" tabindex="-1" role="dialog" aria-labelledby="modalConfirmarBorradoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmarBorradoLabel">Confirmación de Borrado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿En verdad desea borrar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info">Confirmado</button>
            </div>
            </div>
        </div>
    </div>
    <!--End of Modal -->

@endsection