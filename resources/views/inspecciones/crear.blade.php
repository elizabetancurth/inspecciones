@extends('layouts.app')

@section("headerTitle", "Crear Inspección")

@section('content')

<a href="{{ route('inspecciones.index') }}">< Volver a inspecciones</a>
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

    {!! Form::open(['route' => 'inspecciones.store']) !!}
        
        @include('inspecciones.form')        
    
    {!! Form::close() !!}
@endsection