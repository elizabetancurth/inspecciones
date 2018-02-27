@extends('layouts.app')

@section('content')
<div class="container">
    <div class="contenido">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="encabezado">Crear Botiquín</div>
                    </div>
                        <div class="form-group">
                            {!! Form::label('numero_extintor', 'Número de botiquín', ['class' => 'control-label'])!!}
                            {!! Form::number('numero_extintor', null, ['class' => 'form-control']) !!}
                        </div> 

                        <div class="form-group">
                            <label for="sel1">Tipo</label>
                                <select class="form-control" id="sel1">
                                    <option>Básico</option>
                                    <option>Avanzado</option>
                                </select>
                        </div>

                        {!! Form::label('insumos', 'Insumos del botiquín:', ['class' => 'control-label'])!!}
                        <table class="table table-striped"> 
                            <thead>
                                <tr>
                                    <th>Insumo</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tr role="row" class="odd">
                                <td>
                                    <div class="form-group">
                                            <select class="form-control" id="sel1">
                                                <option>Yodopovina espuma</option>
                                                <option>Yodopovina solución</option>
                                                <option>Mercurio plomo</option>
                                                <option>Alcohol</option>
                                                <option>Venda de gasa</option>
                                            </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        {!! Form::text('area', null, ['class' => 'form-control']) !!}
                                    </div>
                                </td>
                            </tr>    
                        </table>

                        {!! Form::submit('Crear Botiquín', ['class' => 'btn btn-primary']) !!}
                        
                        {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection