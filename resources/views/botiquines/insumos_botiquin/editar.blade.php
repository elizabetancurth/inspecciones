@extends("layouts.app")

@section("headerTitle", "Editar Insumo Botiquín")

@section("content")

<a href="{{ route('botiquines.show', $insumo_botiquin->botiquin->id) }}">< Volver a botiquín</a>
<br><br>

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <h6>[Error] Por favor valida los siguientes campos:</h6>
            <hr>
            @foreach ($errors->all() as $error)
                <strong>-></strong> {{ $error }} <br>
            @endforeach
        </div>
    @endif
    
    {!! Form::model($insumo_botiquin, [ 
        'method' => 'PUT', 
        'route' => ['insumos_botiquines.update', $insumo_botiquin->id]
    ])!!}
        
        @include('botiquines.insumos_botiquin.form', ['bthText' => 'Actualizar Insumo']) 


@endsection