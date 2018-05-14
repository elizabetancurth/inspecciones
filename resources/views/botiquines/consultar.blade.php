@extends("layouts.app")

@section("headerTitle", "Gestión de Botiquines")

@section("content")

    <a class="btn btn-info container-fluid" href="{{ route('botiquines.create')}}" role="button">Crear</a>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Listado General de Botiquines</h2></div>
        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>

    @if(count($botiquines) >0)
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Tipo</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($botiquines as $botiquin)
                    <tr>
                        <td>{{$botiquin->codigo}}</td>
                        <td>{{$botiquin->tipo->nombre}}</td>
                        <td>{{$botiquin->ubicacion->edificio->nombre}}</td>
                        <td>{{$botiquin->estado}}</td>
                        <td><a class="btn btn-success" href="{{ route('botiquines.show', $botiquin->id) }}">Ver</span></a></td>
                        <td><a class="btn btn-info" href="{{ route('botiquines.edit', $botiquin->id) }}">Editar</span></a></td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['botiquines.destroy', $botiquin->id]
                            ]) !!}
                                
                            {!! Form::submit('Quitar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>{{"No existen botiquines"}}</h4>
    @endif

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Inicio</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Final</a></li>
        </ul>
    </nav>
@endsection