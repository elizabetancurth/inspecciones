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

    <a class="btn btn-info container-fluid" href="{{ route('inspecciones_botiquines.create')}}" role="button">Crear</a>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Inspección de Botiquines</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar Código..." aria-label="Buscar" aria-describedby="basic-addon2">
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
                <th scope="col">Botiquín</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($botiquines as $botiquin)
                    <tr>
                        <td>{{$botiquin->codigo}}</td>
                        <td>{{$botiquin->tipo_botiquin_id}}</td>
                        <td><a class="btn btn-success" href="{{ route('inspecciones_botiquines.ver_inspeccion', $botiquin->id)}}">Ver</span></a></td>
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
            {{ $botiquines->links() }}
        </ul>
    </nav>
@endsection