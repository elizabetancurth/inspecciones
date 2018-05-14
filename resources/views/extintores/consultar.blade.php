@extends("layouts.app")

@section("headerTitle", "Gestión de Extintores")

@section("content")

    <!-- Código para campo buscar -->
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
    <!-- Fin de código para campo buscar -->

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
            <thead class="thead-light">
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
                        <td><a class="btn btn-success" href="{{ route('extintores.show', $extintor->id) }}">Ver</span></a></td>
                        <td><a class="btn btn-info" href="{{ route('extintores.edit', $extintor->id) }}">Editar</span></a></td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['extintores.destroy', $extintor->id]
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
            <strong>¡Atención!</strong> No existen extintores.
        </div>
    @endif

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $extintores->links() }}
        </ul>
    </nav>

    <hr>
    <a href={{ route('extintores.inactivos') }}>Ver extintores inactivos ></a>

@endsection