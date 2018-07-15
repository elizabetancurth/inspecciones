@extends('layouts.app')

@section("headerTitle", "Crear Extintor")

@section('content')

<a href="{{ route('extintores.index') }}">< Volver a extintores</a>
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
        {{ Form::open(['route' => 'extintores.store', 'method' => 'post']) }}
            @method('post')
            
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Información General</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr>
                        <th>
                            {{ Form::label("codigo", "Código:") }}</th>
                        <td>
                            <input class="form-control" type="text" name="codigo" value="{{$extintor->codigo or old('codigo')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("clasificacion2", "Clasificación:") }}
                        </th>
                        <td>
                            {{ Form::select('clasificacion', $clasificaciones, null, ['required', 'class' => 'form-control']) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("capacidad", "Capacidad (Libras):") }}
                        </th>
                        <td>
                            <input class="form-control" type="number" name="capacidad" value="{{$extintor->capacidad or old('capacidad')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("fechaRecarga", "Fecha de Recarga:") }}
                        </th>
                        <td>
                            <input class="form-control" type="date" name="fechaRecarga" value="{{$extintor->fecha_ultima_recarga->fecha_recarga or old('fechaRecarga')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("fechaVencimiento", "Fecha de Vencimiento:") }}
                        </th>
                        <td>
                            <input class="form-control" type="date" name="fechaVencimiento" value="{{$extintor->fecha_ultima_recarga->fecha_vencimiento or old('fechaVencimiento')}}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
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
                            {{ Form::label("altura", "Altura (cm):") }}
                        </th>
                        <td>
                            <input class="form-control" type="text" name="altura" value="{{$extintor->altura or old('altura')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("referencia", "Referencia:") }}
                        </th>
                        <td>
                            <input class="form-control" type="text" name="referencia" value="{{$extintor->ubicacion->referencia or old('referencia')}}">
                        <br>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>      
        
            
            <a href="{{ route('extintores.index') }}" class="btn btn-secondary">Cerrar</a>
            <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus form-control-feedback"></i> Crear Extintor
            </button>
            
        {!! Form::close() !!}
    </div>
@endsection