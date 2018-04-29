@extends("layouts.app")

@section("headerTitle", "Editar pregunta")

@section("content")

<a href="{{ route('formatos.show', $pregunta->formato->id) }}">< Volver</a>
<br>


    {!! Form::model($pregunta, [ 
        'method' => 'PUT', 
        'route' => ['preguntas.update', $pregunta->id]
    ])!!}

    <div class="form-group">
        <table class="container-fluid">
            <tbody>
                <tr>
                    <div class="form-group row">
                        {!! Form::label('tipo', 'Tipo de pregunta: ', ['class' => 'control-label'])!!}
                        <span class="required">*</span>
                        <select id='tipo' name='tipo_pregunta'  class="form-control"  >
                            <option value="" >{{$pregunta->tipo_pregunta->nombre}}</option>
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
                        {!! Form::label('descripcion', 'Descripción: ', ['class' => 'control-label'])!!}
                        <span class="required"> *</span>
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control','rows' => 3]) !!}
                    </div>
                </tr>
            </tbody>
        </table>  
    </div>
    <div class="modal-footer">
    <a role="button" class="btn btn-secondary" href="{{ route('formatos.show', $pregunta->formato->id) }}">Cerrar</a>
        {!! Form::submit('Actualizar Pregunta', ['class' => 'btn btn-info']) !!}
        {!! Form::close()!!}
    </div>

@endsection