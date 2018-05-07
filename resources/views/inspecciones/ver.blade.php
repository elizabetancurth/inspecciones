@extends("layouts.app")

@section("headerTitle", "Realizar Inspección")

@section("content")

    <a href="{{ route('inspecciones.index') }}">< Volver a inspecciones</a>
    <br>
    <h2>Inspección Extintor N° {{$inspeccion->extintor->codigo}}</h2>
    <br>

    <div class="container">
    
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Respuesta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inspeccion->inspeccion->formato->preguntas as $pregunta)
                <tr>
                    <td>{{$pregunta -> descripcion}}</td>
                    <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">Bueno
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">Regular
                        </label>
                        </div>
                        <div class="form-check disabled">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="" disabled>Malo
                        </label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <a role="button" class="btn btn-secondary" href="#">Cerrar</a>
            <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Guardar Inspección'}}" >
        </div>

    </div>

@endsection