@extends("layouts.app")

@section("headerTitle", "Editar Formato")

@section("content")

<a href="{{ route('formatos.index') }}">< Volver a formatos</a>
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

    {!! Form::model($formato, [ 
        'method' => 'PUT', 
        'route' => ['formatos.update', $formato->id]
    ])!!}
        
        @include('formatos.form', ['bthText' => 'Actualizar formato']) 


@endsection