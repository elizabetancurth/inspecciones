@extends("layouts.app")

@section("headerTitle", "Gestión de Formatos")

@section("content")

    <button type="button" class="btn btn-info container-fluid" data-toggle="modal" data-target="#crearModal">
        Crear
    </button>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Listado General de Formatos</h2></div>
        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>
    @if(count($formatos) >0)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($formatos as $formato)
                    <tr>
                        <td>{{$formato->nombre}}</td>
                        <td><a class="text-muted" href="{{ route('formatos.show', $formato->id) }}"><span class="oi oi-eye"></span></a></td>
                        <td><a class="text-muted" href="#"><span class="oi oi-pencil"></span></a></td>
                        <td><a class="text-muted" data-toggle="modal" data-target="#modalConfirmarBorrado" href=""><span class="oi oi-x"></span></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>{{"No existen formatos"}}</h4>
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

    <!-- Modal Crear -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="crearModalLabel">Crear Formato</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['route' => 'formatos.store']) !!}
                    <div class="form-group">
                        <table class="container-fluid">
                            <tbody>
                                <tr>
                                    <div class="form-group row">
                                        <label for="nombre" class="col-md-5 col-form-label text-md-right">Nombre
                                            <span class="required">*</span>
                                        </label>
                                        

                                        <div class="col-md-6">
                                            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                            @if ($errors->has('nombre'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>  
                    </div>                    	
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            {!! Form::submit('Crear Formato', ['class' => 'btn btn-info']) !!}
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