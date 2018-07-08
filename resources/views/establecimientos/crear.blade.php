@extends('layouts.app')

@section("headerTitle", "Crear Establecimientos")

@section('content')

<a href="{{ route('establecimientos.index') }}">< Volver a establecimientos</a>
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

    {!! Form::open(['route' => 'establecimientos.store']) !!}
        
        @include('establecimientos.form')        
    
    {!! Form::close() !!}
@endsection