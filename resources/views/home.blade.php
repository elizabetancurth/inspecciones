@extends('layouts.app')
@section('content')
<div class="container">
    <div class="contenido">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="encabezado">Bienvenido {{ Auth::user()->name }} </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div id="mensaje-bienvenida">
                            Bienvenido a la plataforma tecnológica del departamento de seguridad y salud en el trabajo, donde puede realizar diferentes e interesantes gestiones con todo lo relacionado a: extintores, botiquines y sus insumos, infraestructura y personal de la Universidad Autónoma de Manizales. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
