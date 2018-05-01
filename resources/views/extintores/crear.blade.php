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

    {!! Form::open(['route' => 'extintores.store']) !!}
        
        @include('extintores.form')        
    
    {!! Form::close() !!}
@endsection