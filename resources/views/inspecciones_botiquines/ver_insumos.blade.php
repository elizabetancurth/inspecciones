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

    <a href="{{ route('inspecciones_botiquines.index') }}">< Volver a inspección de botiquines</a>
    <br>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Inspección Insumos Botiquín</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar Insumo..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>
    <div>
    Insumos a inspeccionar del botiquín código {{$botiquin->codigo}}:
    <br><br>
    </div>

    @if(count($insumos) >0)
        <table id="tabla" class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Insumo</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($insumos as $insumo)
                    <tr>
                        <td>{{$insumo->nombre}}</td>
                        <td>{{$insumo->tipo}}</td>
                        <td><a class="btn btn-success" href="{{ route('inspecciones_botiquines.ver_inspecciones_insumo', $insumo->id)}}">Ver Inspecciones</span></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> No existen insumos.
        </div>
    @endif

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $insumos->links() }}
        </ul>
    </nav>
@endsection