@extends('layouts.app')

@section("headerTitle", "Crear Insumo Botiquín")

@section('content')

<a href="{{ route('botiquines.show', $botiquin->id) }}">< Volver al botiquín</a>
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
    
    {!! Form::open(['route' => 'insumos_botiquines.store']) !!}
        
        @include('botiquines.insumos_botiquin.form')        
    
    {!! Form::close() !!}
@endsection