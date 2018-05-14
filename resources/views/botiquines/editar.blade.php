@extends("layouts.app")

@section("headerTitle", "Editar Insumo Botiquín")

@section("content")

<a href="{{ route('botiquines.index') }}">< Volver a botiquines</a>
<br><br>

    {!! Form::model($botiquin, [ 
        'method' => 'PUT', 
        'route' => ['botiquines.update', $botiquin->id]
    ])!!}
        
        @include('botiquines.form', ['bthText' => 'Actualizar Botiquín']) 

@endsection