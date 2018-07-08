<div class="container col-md-10">
    <table class="container-fluid">
        <thead>
            <tr colspan='2'><h4>Información General</h4></tr>
        </thead><hr><br>
        <tbody>
            <tr>
                <th>
                    {{ Form::label("codigo", "Código:") }}         
                </th>
                <td>
                    <input class="form-control" type="text" name="codigo" value="{{$botiquin->codigo or old('codigo')}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("tipo_botiquin", "Tipo de botiquín:") }}
                </th>
                <td>
                    <select id='tipo_botiquin' name='tipo_botiquin'  class="form-control"  >
                        <option value="" >{{$botiquin->tipo->nombre or "--Seleccione--"}}</option>
                        <?php 
                            $options = "";

                            foreach ($tipos_botiquines as $key => $value)
                            {
                                $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                            }
                            echo $options;
                        ?>
                    </select>
                </td>
            <tr>
        </tbody>
    </table>
    <br> 
    <table class="container-fluid">
        <thead>
            <tr colspan='2'><h4>Ubicación</h4></tr>
        </thead><hr><br>
        <tbody>
            <tr>
                <th>
                    {{ Form::label("bloque", "Bloque:") }}
                </th>
                <td>
                    <select id='edificio' name='edificio'  class="form-control"  >
                        <option value="" >{{$botiquin->ubicacion->edificio->nombre or "--Seleccione--"}}</option>
                        <?php 
                            $options = "";

                            foreach ($edificios as $key => $value)
                            {
                                $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                            }
                            echo $options;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("piso", "Piso:") }}
                </th>
                <td>
                    <select id='piso' name='piso'  class="form-control"  >
                        <option value="" >{{$botiquin->ubicacion->piso or "--Seleccione--"}}</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                    </select>
                </td>
            </tr> 
            <tr>
                <th>
                    {{ Form::label("referencia", "Referencia:") }}
                </th>
                <td>
                    <input class="form-control" type="text" name="referencia" value="{{$botiquin->ubicacion->referencia or old('referencia')}}">
                <br>
                </td>
            </tr> 
        </tbody>
    </table><br> 
    <div>
        <a role="button" class="btn btn-secondary" href="{{ route('botiquines.index') }}">Cerrar</a>
        <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Crear Botiquín'}}" >
    </div>
</div>