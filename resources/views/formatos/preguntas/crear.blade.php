@extends('layouts.app')

@section("headerTitle", "Crear Pregunta")

@section('content')

<a href="{{ route('formatos.show', $formato->id) }}">< Volver al formato</a>
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
        {!! Form::open(['route' => 'preguntas.store']) !!}
        
            <table class="container-fluid">
                <thead>
                    <tr colspan='2'><h4>Crear una pregunta</h4></tr>
                </thead><hr><br>
                <tbody>
                    <tr>
                        <td>
                            {!! Form::label('tipo', 'Seleccione una categoria: ', ['class' => 'control-label'])!!}
                        </td>
                        <td>
                            {{ Form::select('categoria', $categorias, null, ['required', 'class' => 'form-control']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::label('tipo', 'Tipo de pregunta: ', ['class' => 'control-label'])!!}
                        </td>
                        <td>
                            {{ Form::select('tipo_pregunta', $tipos_preguntas, null, ['required', 'class' => 'form-control']) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::label('descripcion', 'Descripción: ', ['class' => 'control-label'])!!}
                        </td>
                        <td>
                            <textarea class="form-control" name="descripcion">{{$pregunta->descripcion or old('descripcion')}} 
                            </textarea>
                        </td>
                    </tr>
                </tbody>
            </table><br>

            <input type="hidden" name="formato_id" value="{{$pregunta->formato->id or $formato->id}}">

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus form-control-feedback"></i> Crear Pregunta
            </button>

        {!! Form::close() !!}
    </div>
@endsection