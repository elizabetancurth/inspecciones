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

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Inspección Insumos Botiquín</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar Código..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>

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
                        <td><a class="btn btn-success" href="#">Ver</span></a></td>
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
            {{ $insumos->links() }}
        </ul>
    </nav>
@endsection