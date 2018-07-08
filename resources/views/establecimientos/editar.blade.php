@extends("layouts.app")

@section("headerTitle", "Editar Establecimiento")

@section("content")

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

    {!! Form::model($establecimiento, [ 
        'method' => 'PUT', 
        'route' => ['establecimientos.update', $establecimiento->id]
    ])!!}
        
        @include('establecimientos.form', ['bthText' => 'Actualizar Establecimiento']) 


@endsection