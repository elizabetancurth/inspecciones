<div class="container col-md-10">
    <table class="container-fluid">
        <thead>
            <tr colspan='2'><h4>Información General</h4></tr>
        </thead><hr><br>
        <tbody>
            <tr>
                <th>
                    {{ Form::label("nombre", "Nombre:") }}</th>
                <td>
                    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$formato->nombre or old('nombre') }}" required autofocus>

                    @if ($errors->has('nombre'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table><br>
    <div>
        <a role="button" class="btn btn-secondary" href="{{ route('formatos.index') }}">Cerrar</a>
        <input class="btn btn-primary" type="submit" value="{{ $bthText or 'Crear Formato'}}" >
    </div>
</div>