@extends("layouts.app")

@section("headerTitle", "Editar Insumo Botiquín")

@section("content")

<a href="{{ route('botiquines.show', $insumo_botiquin->botiquin->id) }}">< Volver a botiquín</a>
<br><br>

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <h6>[Error] Por favor valida los siguientes campos:</h6>
            <hr>
            @foreach ($errors->all() as $error)
                <strong>-></strong> {{ $error }} <br>
            @endforeach
        </div>
    @endif
    
    <div class="container col-md-10">
        {{ Form::model($insumo_botiquin, ['route' => ['insumos_botiquines.update', $insumo_botiquin], 'method' => 'post']) }}
            @method('put')
        
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
                            {{ Form::select('tipo', array('--Seleccione--', 'Fármaco', 'Utencilio') , $insumo_botiquin->tipo , ['required', 'class' => 'form-control']) }}
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
            <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus form-control-feedback"></i> Actualizar Inusmo Botiquín
            </button>
        {!! Form::close() !!}
    </div> 
@endsection