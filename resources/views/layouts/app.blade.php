<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    </head>
    <body>
        
        <!-- Header -->
        
        <div class="card-body container-fluid text-center align-middle">
            <div id="bar-menu">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="images/logo.png" alt="" width=100px;>
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h1>Unidad de Seguridad y Salud en el Trabajo</h1>
                </a>
            </div>  
        </div>
        
        <!-- End of Header -->
        
        <div class="container">
            <div class="row">
                <!-- Left panel -->
                <div class="col col-md-3">
                    <!-- User Session Section -->
                    @if (Auth::user())
                        <div class="card text-center">
                            <div class="card-header text-left">Bienvenido</div>
                            <div>
                                <br>
                             <!--<img class="card-img-top" src="cat.jpeg" alt="User Image">-->
                            </div>
                            <div class="card-body">
                                <div class="dropdown container-fluid">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Ver Perfil</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    Cerrar sesión
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!--End of User Session Section -->

                    <!-- Menú de navegación usuarios autenticados -->
                    @if (Auth::user())
                        <div id="accordion">
                            <div class="card">

                                <div class="card-header">
                                    <a href="home" class="btn btn-link">Inicio</a>
                                </div>

                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Extintores
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
                                    <a href="{{ route('extintores.index') }}" class="list-group-item list-group-item-action">Listar</a>
                                </div>

                                <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Botiquines
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse hide" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <a href="{{ route('botiquines.index') }}" class="list-group-item list-group-item-action">Listar</a>
                                </div>

                                <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            Establecimientos
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse hide" aria-labelledby="headingThree" data-parent="#accordion">
                                        <a href="#" class="list-group-item list-group-item-action">Listar</a>
                                        <a href="#" class="list-group-item list-group-item-action">Crear</a>
                                </div>

                                <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            Inspecciones
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse hide" aria-labelledby="headingFour" data-parent="#accordion">
                                        <a href="#" class="list-group-item list-group-item-action">Listar</a>
                                        <a href="#" class="list-group-item list-group-item-action">Programar</a>
                                </div>

                                <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                            Formatos
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse hide" aria-labelledby="headingFive" data-parent="#accordion">
                                        <a href="#" class="list-group-item list-group-item-action">Listar</a>
                                        <a href="#" class="list-group-item list-group-item-action">Diseñar</a>
                                </div>

                                @if(Auth::user()->rol=='Administrador')
                                    <div class="card-header" id="headingSix">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                Usuarios
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse hide" aria-labelledby="headingSix" data-parent="#accordion">
                                            <a href="#" class="list-group-item list-group-item-action">Listar</a>
                                            <a href="{{ route('register') }}" class="list-group-item list-group-item-action">Crear</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End of Left Panel -->
                @endif

                <!-- Content -->
                <div class="col">
                    <div class="card w-100 h-100">
                        <div class="card-header">
                            @yield('headerTitle')
                        </div>
                        <div class="card-body h-100">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- End of Content -->
            </div>
        </div>

        <div class="card-body container-fluid text-center align-middle footer" style="padding-top: 15px;">
            <p>
                <h6>
                    Universidad Autónoma de Manizales<br> 
                    ELizabeth Betancurth Candamil, Daniel Arboleda Betancur y Jorge Iván Meza Martínez<br>
                    Semillero UAM <br>
                    Derechos Reservados 2018
                </h6>
            </p>
        </div>
    </body>
</html>
