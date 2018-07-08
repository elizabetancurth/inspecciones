@extends('layouts.app')

@section("headerTitle", "Crear Botiquín")

@section('content')

<a href="{{ route('botiquines.index') }}">< Volver a botiquines</a>
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
    
    {!! Form::open(['route' => 'botiquines.store']) !!}
        
        @include('botiquines.form')        
    
    {!! Form::close() !!}
@endsection