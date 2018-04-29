@extends("layouts.app")

@section("headerTitle", "Gestión de Extintores")

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

    <a class="btn btn-info container-fluid" href="{{ route('extintores.create')}}" role="button">Crear</a>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Listado General de Extintores</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar Código..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>
    <hr>

    @if(count($extintores) >0)
        <table id="tabla" class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha de Recarga</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($extintores as $extintor)
                    <tr>
                        <td>{{$extintor->codigo}}</td>
                        <td>{{$extintor->clasificacion->nombre}}</td>
                        <td>{{$extintor->fecha_ultima_recarga->fecha_recarga}}</td>
                        <td>{{$extintor->estado}}</td>
                        <td><a class="text-muted" href="{{ route('extintores.show', $extintor->id) }}"><span class="oi oi-eye"></span></a></td>
                        <td><a class="text-muted" href="{{ route('extintores.edit', $extintor->id) }}"><span class="oi oi-pencil"></span></a></td>
                        <td><a class="text-muted" data-toggle="modal" data-target="#modalConfirmarBorrado" href=""><span class="oi oi-x"></span></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>No existen extintores</h4>
    @endif

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $extintores->links() }}
        </ul>
    </nav>

    <!-- Modal Confirmación Borrado -->
    <div class="modal fade" id="modalConfirmarBorrado" tabindex="-1" role="dialog" aria-labelledby="modalConfirmarBorradoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmarBorradoLabel">Confirmación de Borrado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿En verdad desea borrar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info">Confirmado</button>
            </div>
            </div>
        </div>
    </div>
    <!--End of Modal -->

@endsection