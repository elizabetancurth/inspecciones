@extends("layouts.app")

@section("headerTitle", "Editar Insumo Botiquín")

@section("content")

<a href="{{ route('botiquines.index') }}">< Volver a botiquines</a>
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

    {!! Form::model($botiquin, [ 
        'method' => 'PUT', 
        'route' => ['botiquines.update', $botiquin->id]
    ])!!}
        
        @include('botiquines.form', ['bthText' => 'Actualizar Botiquín']) 

@endsection