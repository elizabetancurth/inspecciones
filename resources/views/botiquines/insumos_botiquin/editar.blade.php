@extends("layouts.app")

@section("headerTitle", "Editar Insumo Botiquín")

@section("content")

<a href="{{ route('botiquines.show', $insumo_botiquin->botiquin->id) }}">< Volver a botiquín</a>
<br><br>

    {!! Form::model($insumo_botiquin, [ 
        'method' => 'PUT', 
        'route' => ['insumos_botiquines.update', $insumo_botiquin->id]
    ])!!}
        
        @include('botiquines.insumos_botiquin.form', ['bthText' => 'Actualizar Insumo']) 


@endsection