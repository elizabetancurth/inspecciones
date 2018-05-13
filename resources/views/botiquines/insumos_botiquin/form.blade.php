<div class="container col-md-10">
    <table class="container-fluid">
        <thead>
            <tr colspan='2'><h4>Información General</h4></tr>
        </thead><hr><br>
        <tbody>
            <tr>
                <th>
                    {{ Form::label("nombre", "Nombre:") }}         
                </th>
                <td>
                    <input class="form-control" type="text" name="nombre" value="{{$insumo_botiquin->nombre or old('nombre')}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("tipo", "Tipo:") }}
                </th>
                <td>
                    <select id='tipo' name='tipo'  class="form-control"  >
                        <option value="" >{{$insumo_botiquin->tipo or "--Seleccione--"}}</option>
                            <option>Fármaco</option>
                            <option>Utencilio</option>
                    </select>
                </td>
            <tr>
            <tr>
                <th>
                    {{ Form::label("fechaVencimiento", "Fecha de vencimiento:") }}
                </th>
                <td>
                    <input class="form-control" type="date" name="fechaVencimiento" value="{{$insumo_botiquin->fecha_vencimiento or '\Carbon\Carbon::now()'}}">
                </td>
            </tr>
            <tr>
                <th>
                    {{ Form::label("cantidad", "Cantidad:") }}         
                </th>
                <td>
                    <input class="form-control" type="number" name="cantidad" value="{{$insumo_botiquin->cantidad or old('cantidad')}}">
                </td>
            </tr>
        </tbody>
    </table>  
    <input type="hidden" name="botiquin_id" value="{{$insumo_botiquin->botiquin->id or $botiquin->id}}">
        <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Crear Insumo Botiquín'}}" >
    </div>
</div>