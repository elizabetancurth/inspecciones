@extends('layouts.app')

@section("headerTitle", "Crear Botiquín")

@section('content')

<a href="{{ route('botiquines.index') }}">< Volver a botiquines</a>
<br>
<br>
    
    {!! Form::open(['route' => 'botiquines.store']) !!}
        
        @include('botiquines.form')        
    
    {!! Form::close() !!}
@endsection