@extends('layouts.app')

@section("headerTitle", "Crear Inspección")

@section('content')

<a href="{{ route('inspecciones_botiquines.index') }}">< Volver a inspeccion de botiquines</a>
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

    {!! Form::open(['route' => 'inspecciones_botiquines.store']) !!}
        
        @include('inspecciones_botiquines.form')        
    
    {!! Form::close() !!}
@endsection