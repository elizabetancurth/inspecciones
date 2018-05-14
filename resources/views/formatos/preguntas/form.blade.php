<div class="container col-md-10">
    <table class="container-fluid">
        <tbody>
            <tr>
                <td>
                    {!! Form::label('tipo', 'Tipo de pregunta: ', ['class' => 'control-label'])!!}
                </td>
                <td>
                    <select id='tipo' name='tipo_pregunta'  class="form-control"  >
                        <option value="" >{{$pregunta->tipo_pregunta->nombre or "--Seleccione--"}}</option>
                        <?php 
                            $options = "";

                            foreach ($tipos_preguntas as $key => $value)
                            {
                                $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                            }
                            echo $options;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    {!! Form::label('descripcion', 'Descripción: ', ['class' => 'control-label'])!!}
                </td>
                <td>
                    <textarea class="form-control" name="descripcion">{{$pregunta->descripcion or old('descripcion')}} 
                    </textarea>
                </td>
            </tr>
        </tbody>
    </table><br>
    <input type="hidden" name="formato_id" value="{{$pregunta->formato->id or $formato->id}}">
    <div>
        <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Crear Pregunta'}}" >
    </div> 
</div>