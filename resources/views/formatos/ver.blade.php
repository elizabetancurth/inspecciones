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
            <thead class="thead-dark">
            <tr>
                <th scope="col">Preguntas</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($formato->preguntas as $pregunta)
                    <tr>
                        <td>{{$pregunta->descripcion}}</td>
                        <td><a class="text-muted" href="#"><span class="oi oi-eye"></span></a></td>
                        <td><a class="text-muted" href="#"><span class="oi oi-pencil"></span></a></td>
                        <td><a class="text-muted" data-toggle="modal" data-target="#modalConfirmarBorrado" href=""><span class="oi oi-x"></span></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>{{"No existen preguntas en el formato"}}</h4>
    @endif
        <br>
    </div>

    <button type="button" class="btn btn-info container-fluid" data-toggle="modal" data-target="#crearModal">
        Añadir Pregunta
    </button>

    <!-- Modal Crear -->
    <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="crearModalLabel">Crear Pregunta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open(['route' => 'preguntas.store']) !!}
                    <div class="form-group">
                        <table class="container-fluid">
                            <tbody>
                                <tr>
                                    <div class="form-group row">
                                        {!! Form::label('tipo', 'Tipo de pregunta', ['class' => 'control-label'])!!}
                                        <select id='tipo' name='tipo_pregunta'  class="form-control"  >
                                            <option value="" >Seleccione el tipo</option>
                                            <?php 
                                                $options = "";

                                                foreach ($tipos_preguntas as $key => $value)
                                                {
                                                    $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                                                }
                                                echo $options;
                                            ?>
                                        </select>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group row">
                                        {!! Form::label('descripcion', 'Descripción', ['class' => 'control-label'])!!}
                                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => 3]) !!}
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group row">
                                        {!! Form::text('formato_id', $formato->id, ['class' => 'form-control'])!!}
                                    </div>
                                </tr>
                            </tbody>
                        </table>  
                    </div>                    	
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            {!! Form::submit('Crear Pregunta', ['class' => 'btn btn-info']) !!}
            {!! Form::close()!!}
            </div>
            </div>
        </div>
    </div>
    <!-- End Crear Modal -->
@endsection