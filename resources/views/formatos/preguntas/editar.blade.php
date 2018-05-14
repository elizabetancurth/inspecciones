@extends("layouts.app")

@section("headerTitle", "Editar Pregunta")

@section("content")

<a href="{{ route('formatos.show', $pregunta->formato->id) }}">< Volver a preguntas</a>
<br><br>

    {!! Form::model($pregunta, [ 
        'method' => 'PUT', 
        'route' => ['preguntas.update', $pregunta->id]
    ])!!}
        
        @include('formatos.preguntas.form', ['bthText' => 'Actualizar Pregunta']) 


@endsection