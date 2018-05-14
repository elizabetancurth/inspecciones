@extends("layouts.app")

@section("headerTitle", "Datos del botiquín")

@section("content")

    <div class"container">
        <div class="row">
            <div class="col">
                <a href="{{ route('botiquines.index') }}">< Volver a botiquines</a>
                <br>
                <h2>Botiquín {{$botiquin->tipo->nombre}} N° {{$botiquin->codigo}}</h2>
                <br>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-md-7">
                <h3>Ubicación</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Bloque</th>
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
            </div>
            <div class="col col-md-5" >
                {!!QrCode::size(150)->generate(Request::url()); !!}
            </div>
        </div>
    </div>

    <div class="container"> 
        <div class="col-mod-3">
            <h3>Insumos</h3>
        </div>
    
    @if(count($botiquin->insumos_botiquin)>0)
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha Vencimiento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($botiquin->insumos_botiquin as $insumo_botiquin)
                <tr>
                    <td>{{$insumo_botiquin->nombre}}</td>
                    <td>{{$insumo_botiquin->cantidad}}</td>
                    <td>@if($insumo_botiquin->fecha_vencimiento === null)
                            No aplica
                        @else
                            {{$insumo_botiquin->fecha_vencimiento}}
                        @endif
                    </td>
                    <td><a class="btn btn-info" href="{{ route('insumos_botiquines.edit', $insumo_botiquin->id) }}">Editar</span></a></td>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['insumos_botiquines.destroy', $insumo_botiquin->id]
                        ]) !!}
                        
                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> No existen insumos en este botiquín.
        </div>
        <br>
    @endif
    </div>

    <a class="btn btn-info container-fluid" href="{{ route('insumos_botiquines.create_insumo' , $botiquin->id)}}" role="button">Crear Insumo</a>
@endsection