@extends("layouts.app")

@section("headerTitle", "Gestión de Formatos")

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

    <a href="{{ route('formatos.index') }}">< Volver a formatos</a>
    <hr>

    <!--<div class="align-items-end text-right container-fluid input-group mb-3 col-md-4">-->
    <div class="container-fluid input-group mb-3" style="padding: 0px;">
        <div class="col-md-8"><h2>Formatos Inactivos</h2></div>
        <input onkeyup="myFunction()" id="buscar" type="text" class="form-control" placeholder="Buscar formato..." aria-label="Buscar" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                    <a class="text-muted" href="#"><span class="oi oi-magnifying-glass"></span></a>
            </button>
        </div>    
    </div>

    <hr>
    @if(count($formatos) >0)
        <table id="tabla" class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($formatos as $formato)
                    <tr>
                        <td>{{$formato->nombre}}</td>
                        <td>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['formatos.destroy', $formato->id]
                            ]) !!}
                            
                            {!! Form::submit('Activar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> No existen formatos inactivos.
        </div>
    @endif

    <nav aria-label="container-fluid Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $formatos->links() }}
        </ul>
    </nav>
@endsection