@extends("layouts.app")

@section("headerTitle", "Datos del botiquín")

@section("content")
<a href="{{ route('botiquines.index') }}">Volver a botiquines</a>
<br>
<h2>Botiquín {{$botiquin->tipo->nombre}} N° {{$botiquin->codigo}}</h2>
<br>

    <div class="container">
        <div class="col-mod-3">
            <h3>Ubicación</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Edificio</th>
                    <th scope="col">Piso</th>
                    <th scope="col">Referencia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$botiquin->ubicacion->edificio->nombre }}</td>
                    <td>{{$botiquin->ubicacion->piso }}</td>
                    <td>{{$botiquin->ubicacion->referencia }}</td>
                </tr>
            </tbody>
        </table>
        <br>
    </div>

    <div class="container"> 
        <div class="col-mod-3">
            <h3>Insumos:</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha Vencimiento</th>
                </tr>
            </thead>
            <tbody>
            @foreach($botiquin->insumos_botiquin as $insumo_botiquin)
                <tr>
                    <td>$insumo_botiquin->nombre</td>
                    <td>$insumo_botiquin->cantidad</td>
                    <td>$insumo_botiquin->fecha_vencimiento</td>
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-info container-fluid" data-toggle="modal" data-target="#crearModal">
        Crear Insumo
    </button>

    <!-- Modal Crear -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="crearModalLabel">Crear Insumo Botiquín {{$botiquin->codigo}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['route' => 'insumos_botiquines.store' , $botiquin->id]) !!}
                    <div class="form-group">
                        <table class="container-fluid">
                            <thead><th colspan="2"><h4>Información General</h4></th></thead>
                            <tbody>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("nombre", "Nombre:") }}         
                                    </th>
                                    <td>
                                        {{ Form::text("nombre", "", ["class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                                <tr>
                                <th class="col-md-5">
                                        {{ Form::label("tipo", "Tipo:") }}
                                    </th>
                                    <td>
                                        {{ Form::select( "tipo"
                                            ,["S" => "--Seleccione--", "1" => "Fármaco", "2" => "Utencilio"]
                                            , ""
                                            ,["class" => "container-fluid"]) }}
                                    </td>
                                <tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("fechaVecimiento", "Fecha de vencimiento:") }}
                                    </th>
                                    <td>
                                        {{ Form::date("fechaVecimiento", \Carbon\Carbon::now(), ["class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="col-md-5">
                                        {{ Form::label("cantidad", "Cantidad:") }}         
                                    </th>
                                    <td>
                                        {{ Form::number("cantidad", null, ["class" => "container-fluid"]) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>  
                    </div>                    	
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            {!! Form::submit('Crear Insumo Botiquín', ['class' => 'btn btn-info']) !!}
            {!! Form::close()!!}
            </div>
            </div>
        </div>
    </div>
    <!-- End Crear Modal -->
@endsection