@extends("layouts.app")

@section("headerTitle", "Gestión de Inspecciones")

@section("content")

    <script>
            function myFunction() {
            // Declare variables 
            var input, filter, table, tr, td, i;
            input = document.getElementById("buscar");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabla");
            tr = table.getElementsByTagName("tr");
            
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                } 
            }
            }
    </script>

    <a class="btn btn-info container-fluid" href="{{ route('inspecciones_establecimientos.create')}}" role="button">Crear</a>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Inspección de Establecimientos</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar Nombre..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>

    @if(count($inspecciones) >0)
        <table id="tabla" class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Establecimiento</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($inspecciones as $inspeccion)
                    <tr>
                        <td>{{$inspeccion->inspeccion->fecha}}</td>
                        <td>{{$inspeccion->inspeccion->estado_inspeccion}}</td>
                        <td>{{$inspeccion->establecimiento->nombre}}
                        <td>
                            @if($inspeccion->inspeccion->estado_inspeccion === "Pendiente")
                                <a class="btn btn-success" href="{{ route('inspecciones_establecimientos.show', $inspeccion->id) }}">Realizar</span></a></td>
                            @endif
                            @if($inspeccion->inspeccion->estado_inspeccion === "Realizada")
                                <a class="btn btn-info" href="{{ route('res_inspecciones_establecimientos.show', $inspeccion->id) }}">Resultado</span></a></td>
                            @endif
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['inspecciones_establecimientos.destroy', $inspeccion->id]
                            ]) !!}
                                
                            {!! Form::submit('Quitar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> No existen inspecciones.
        </div>
    @endif

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $inspecciones->links() }}
        </ul>
    </nav>

    <hr>
    <a href="{{ route('inspecciones_establecimientos.inactivos')}}">Ver inspecciones de establecimientos inactivas ></a>

@endsection