<div class="container col-md-10">
    <table class="container-fluid">
        <thead>
            <tr colspan='2'><h4>Información General</h4></tr>
        </thead><hr><br>
        <tbody>
            <tr>
                <th>
                    {{ Form::label("fecha", "Fecha:") }}</th>
                <td>
                <input class="form-control" type="date" name="fecha" value="{{$inspeccion->fecha or old('fecha')}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("hora", "Hora:") }}</th>
                <td>
                <input class="form-control" type="time" name="hora" value="{{$inspeccion->hora or old('hora')}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("formato", "Formato:") }}
                </th>
                <td>
                    <select id='formato' name='formato'  class="form-control"  >
                        <option value="" >{{$inspeccion->formato->nombre or "--Seleccione--"}}</option>
                        <?php 
                            $options = "";

                            foreach ($formatos as $key => $value)
                            {
                                $options .=  "<option  value='".$value->id."'> ".$value->nombre."</option>";
                            }
                            echo $options;
                        ?>
                    </select>
                </td>
            </tr>
        </tbody>
    </table><br>
    <div>
        <a role="button" class="btn btn-secondary" href="{{ route('inspecciones_botiquines.index') }}">Cerrar</a>
        <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Crear Inspección Botiquines'}}" >
    </div>
</div>