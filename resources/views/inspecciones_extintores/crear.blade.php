@extends('layouts.app')

@section("headerTitle", "Crear Inspección")

@section('content')

<a href="{{ route('inspecciones_extintores.index') }}">< Volver a inspeccion de extintores</a>
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

    {!! Form::open(['route' => 'inspecciones_extintores.store']) !!}
        
        @include('inspecciones_extintores.form')        
    
    {!! Form::close() !!}
@endsection