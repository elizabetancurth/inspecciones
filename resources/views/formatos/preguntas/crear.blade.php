@extends('layouts.app')

@section("headerTitle", "Crear Pregunta")

@section('content')

<a href="{{ route('formatos.show', $formato->id) }}">< Volver al formato</a>
<br>
<br>
    
    {!! Form::open(['route' => 'preguntas.store']) !!}
        
        @include('formatos.preguntas.form')        
    
    {!! Form::close() !!}
@endsection