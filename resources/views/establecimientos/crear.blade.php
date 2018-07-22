@extends('layouts.app')

@section("headerTitle", "Crear Establecimientos")

@section('content')

<a href="{{ route('establecimientos.index') }}">< Volver a establecimientos</a>
<br>
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <h6>[Error] Por favor valida los siguientes campos:</h6>
            <hr>
            @foreach ($errors->all() as $error)
                <strong>-></strong> {{ $error }} <br>
            @endforeach
        </div>
    @endif


    <div class="container col-md-10">
        {!! Form::open(['route' => 'establecimientos.store']) !!}
            
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Información General del Establecimiento</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr>
                        <th>
                            {{ Form::label("nombre", "Nombre:") }}</th>
                        <td>
                            <input class="form-control" type="text" name="nombre" value="{{$establecimiento->nombre or old('nombre')}}">
                        </td>
                    </tr>
                </tbody>
            </table><br>
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Ubicación</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr>
                        <th>
                            {{ Form::label("bloque", "Bloque:") }}
                        </th>
                        <td>
                            {{ Form::select('edificio', $edificios, null, ['required', 'class' => 'form-control']) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("piso", "Piso:") }}
                        </th>
                        <td>
                            {{ Form::selectRange('piso', 1, 5, null , ['required', 'class' => 'form-control']) }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ Form::label("referencia", "Referencia:") }}
                        </th>
                        <td>
                            <input class="form-control" type="text" name="referencia" value="{{$establecimiento->ubicacion->referencia or old('referencia')}}">
                        <br>
                        </td>
                    </tr> 
                </tbody>
            </table>
            <br>
            
            <a href="{{ route('establecimientos.index') }}" class="btn btn-secondary">Cerrar</a>
            <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus form-control-feedback"></i> Crear Establecimiento
            </button> 
                
        {!! Form::close() !!}
    </div>
@endsection