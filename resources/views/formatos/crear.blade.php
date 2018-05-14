@extends('layouts.app')

@section("headerTitle", "Crear Formato")

@section('content')

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

    {!! Form::open(['route' => 'formatos.store']) !!}
        
        @include('formatos.form')        
    
    {!! Form::close() !!}
@endsection