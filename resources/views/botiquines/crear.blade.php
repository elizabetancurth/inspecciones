@extends('layouts.app')

@section("headerTitle", "Crear Botiquín")

@section('content')

<a href="{{ route('botiquines.index') }}">< Volver a botiquines</a>
<br>
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
        {!! Form::open(['route' => 'botiquines.store']) !!}
            
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Información General</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr>
                        <th>
                            {{ Form::label("codigo", "Código:") }}         
                        </th>
                        <td>
                            <input class="form-control" type="text" name="codigo" value="{{$botiquin->codigo or old('codigo')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ Form::label("tipo_botiquin", "Tipo de botiquín:") }}
                        </th>
                        <td>
                            {{ Form::select('tipo_botiquin', $tipos_botiquines, null, ['required', 'class' => 'form-control']) }}
                        </td>
                    <tr>
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
            <a href="{{ route('botiquines.index') }}" class="btn btn-secondary">Cerrar</a>
            <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus form-control-feedback"></i> Crear Botiquín
            </button>     
        {!! Form::close() !!}
    </div>
@endsection