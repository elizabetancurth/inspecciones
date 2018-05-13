@extends('layouts.app')

@section("headerTitle", "Crear Insumo Botiquín")

@section('content')

<a href="{{ route('botiquines.show', $botiquin->id) }}">< Volver al botiquín</a>
<br>
<br>
    
    {!! Form::open(['route' => 'insumos_botiquines.store']) !!}
        
        @include('botiquines.insumos_botiquin.form')        
    
    {!! Form::close() !!}
@endsection