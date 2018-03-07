@extends('layouts.app')

@section('content')
<div class="container">
    <div class="contenido">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="encabezado">Crear Extintor</div>
                    </div>
                        <div class="form-group">
                            {!! Form::label('numero_extintor', 'Número de extintor', ['class' => 'control-label'])!!}
                            {!! Form::number('numero_extintor', null, ['class' => 'form-control']) !!}
                        </div> 

                        <div class="form-group">
                            <label for="sel1">Clasificación</label>
                                <select class="form-control" id="sel1">
                                    <option>ABC Multipropósito</option>
                                    <option>Agua a presión</option>
                                    <option>CO2</option>
                                    <option>Solkaflam</option>
                                </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('capacidad', 'Capacidad', ['class' => 'control-label'])!!}
                            {!! Form::number('capacidad', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::label('ubicacion', 'Ubicación:', ['class' => 'control-label'])!!}
                        <div class="form-group">
                            <label for="sel1">Bloque</label>
                                <select class="form-control" id="sel1">
                                    <option>Biblioteca</option>
                                    <option>Bloque 12</option>
                                    <option>Bloque 13</option>
                                    <option>Bloque 16</option>
                                    <option>Edificio Fundadores</option>
                                </select>

                                <div class="form-group">
                                    {!! Form::label('area', 'Area', ['class' => 'control-label'])!!}
                                    {!! Form::text('area', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('altura', 'Altura', ['class' => 'control-label'])!!}
                                    {!! Form::text('altura', null, ['class' => 'form-control']) !!}
                                </div>
                        </div>

                        {!! Form::submit('Crear Extintor', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection