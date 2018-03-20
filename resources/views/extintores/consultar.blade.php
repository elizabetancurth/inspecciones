@extends('layouts.app')
@section('content')
<div class="container">
    <div class="contenido">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="encabezado">Extintores</div>
                    </div>
                    <div class="boton">
                        <button type='button' class='btn btn-info' data-toggle='modal' data-target='#capa_modal' style='width:100%'>
                            <span class='fa fa-eye' aria-hidden='true'></span>
                            <a href={{ route('extintores.create')}}>Crear nuevo extintor</a>
                        </button>
                    </div>
                    <div>
                        <table class="table table-striped"> 
                            <thead>
                                <tr>
                                    <th>N° Extintor</th>
                                    <th>Clasificación</th>
                                    <th>Ubicación</th>
                                    <th>Ver</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tr role="row" class="odd">
                                <td>1</td>
                            
                                <td>ABC Multipropósito</td>
                            
                                <td>Torre del saber - Salón de música</td>
                            
                                <td>
                                    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#capa_modal'  style='width:100%'>
                                    <span class='glyphicon glyphicon glyphicon-pencil' aria-hidden='true'></span>
                                    </button>
                                </td>
                            
                                <td>
                                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#capa_modal'  style='width:100%'>
                                    <span class='glyphicon glyphicon glyphicon-pencil' aria-hidden='true'></span>
                                    </button>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>2</td>
                            
                                <td>ABC Multipropósito</td>
                            
                                <td>Edificio Central - Antiguo Mercadeo</td>
                            
                                <td>
                                    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#capa_modal'  style='width:100%'>
                                    <span class='glyphicon glyphicon glyphicon-pencil' aria-hidden='true'></span>
                                    </button>
                                </td>
                            
                                <td>
                                    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#capa_modal'  style='width:100%'>
                                    <span class='glyphicon glyphicon glyphicon-pencil' aria-hidden='true'></span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection