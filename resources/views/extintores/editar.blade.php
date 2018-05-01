@extends("layouts.app")

@section("headerTitle", "Editar extintor")

@section("content")

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

    {!! Form::model($extintor, [ 
        'method' => 'PUT', 
        'route' => ['extintores.update', $extintor->id]
    ])!!}
        
        @include('extintores.form', ['bthText' => 'Actualizar Extintor']) 


@endsection