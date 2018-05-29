@extends("layouts.app")

@section("headerTitle", "Gestión de Inspecciones en Botiquines")

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
                td = tr[i].getElementsByTagName("td")[0];
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

    <a href="{{ route('inspecciones_botiquines.ver_inspecciones_insumos', $insumo->botiquin->id)}}">< Volver a insumos de botiquín</a>
    <br>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Inspecciones Insumo Botiquín</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar Fecha..." aria-label="Buscar" aria-describedby="basic-addon2">
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
                <th scope="col">Insumo</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($inspecciones as $inspeccion)
                    <tr>
                    <td>{{$inspeccion->inspeccion->fecha}}</td>
                        <td>{{$inspeccion->insumo_botiquin->nombre}}</td>
                        <td>{{$inspeccion->inspeccion->estado_inspeccion}}</td>
                        <td>
                            @if($inspeccion->inspeccion->estado_inspeccion === "Pendiente")
                                <a class="btn btn-success" href="{{ route('inspecciones_botiquines.show', $inspeccion->id) }}">Realizar</span></a>
                            @endif
                            @if($inspeccion->inspeccion->estado_inspeccion === "Realizada")
                                <a class="btn btn-info" href="{{ route('res_inspecciones_botiquines.show', $inspeccion->id) }}">Resultado</span></a>
                            @endif
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
@endsection