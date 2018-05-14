@extends("layouts.app")

@section("headerTitle", "Datos del Formato")

@section("content")
<a href="{{ route('formatos.index') }}">< Volver a formatos</a>
<br>
<h2>{{$formato->nombre}}</h2>
<br>

    <div class="container">
    @if(count($formato->preguntas) >0)
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Preguntas</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($formato->preguntas as $pregunta)
                    <tr>
                        <td>{{$pregunta->descripcion}}</td>
                        <td><a class="btn btn-info" href="{{ route('preguntas.edit', $pregunta->id) }}">Editar</span></a></td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['preguntas.destroy', $pregunta->id]
                            ]) !!}
                            
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> No existen preguntas en el formato.
        </div>
    @endif
        <br>
    </div>

    <a class="btn btn-info container-fluid" href="{{ route('preguntas.create_pregunta' , $formato->id)}}" role="button">Añadir Pregunta</a>

@endsection