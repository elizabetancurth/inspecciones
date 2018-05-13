<div class="container col-md-10">
    <table class="container-fluid">
        <thead>
            <tr colspan='2'><h4>Información General</h4></tr>
        </thead><hr><br>
        <tbody>
            <tr>
                <th>
                    {{ Form::label("codigo", "Código:") }}</th>
                <td>
                    <input class="form-control" type="text" name="codigo" value="{{$extintor->codigo or old('codigo')}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("clasificacion", "Clasificación:") }}
                </th>
                <td>
                    <select id='clasificacion' name='clasificacion'  class="form-control"  >
                        <option value="" >{{$extintor->clasificacion->nombre or "--Seleccione--"}}</option>
                        <?php 
                            $options = "";

                            foreach ($clasificaciones as $key => $value)
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
                    {{ Form::label("capacidad", "Capacidad (Libras):") }}
                </th>
                <td>
                    <input class="form-control" type="number" name="capacidad" value="{{$extintor->capacidad or old('capacidad')}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("fechaRecarga", "Fecha de Recarga:") }}
                </th>
                <td>
                    <input class="form-control" type="date" name="fechaRecarga" value="{{$extintor->fecha_ultima_recarga->fecha_recarga or old('fechaRecarga')}}">
                </td>
            </tr> 
            <tr>
                <th>
                    {{ Form::label("fechaVencimiento", "Fecha de Vencimiento:") }}
                </th>
                <td>
                    <input class="form-control" type="date" name="fechaVencimiento" value="{{$extintor->fecha_ultima_recarga->fecha_vencimiento or old('fechaVencimiento')}}">
                </td>
            </tr> 
        </tbody>
    </table><br>
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
                        <option value="" >{{$extintor->ubicacion->edificio->nombre or "--Seleccione--"}}</option>
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
                        <option value="" >{{$extintor->ubicacion->piso or "--Seleccione--"}}</option>
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
                    {{ Form::label("altura", "Altura (cm):") }}
                </th>
                <td>
                    <input class="form-control" type="text" name="altura" value="{{$extintor->altura or old('altura')}}"> 
                </td>
            </tr> 
            <tr>
                <th>
                    {{ Form::label("referencia", "Referencia:") }}
                </th>
                <td>
                    <input class="form-control" type="text" name="referencia" value="{{$extintor->ubicacion->referencia or old('referencia')}}">
                <br>
                </td>
            </tr> 
        </tbody>
    </table><br>

    <div>
        <a role="button" class="btn btn-secondary" href="{{ route('extintores.index') }}">Cerrar</a>
        <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Crear Extintor'}}" >
    </div>
</div>