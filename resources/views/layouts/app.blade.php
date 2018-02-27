<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Plataforma Tecnológica | Unidad de Seguridad y Salud en el Trabajo') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col-md-9">
            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container">
                        <div id="bar-menu">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="images/logo.png" alt="" width=150px;>
                            </a>
                            <a class="navbar-brand" href="{{ url('/') }}">
                                Inspecciones | Unidad de Seguridad y Salud en el Trabajo
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                Cerrar sesión
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Menú de navegación usuarios autenticados -->
                @if (Auth::user())
                    <div class="py-4">
                        <div class="col-menu">
                            <div class="col-md-4">
                                <div class="container">    
                                    <div class="encabezado">
                                        Menú
                                    </div>    
                                    <div class="card">
                                        <nav class="navbar navbar-default">
                                            <div class="container-fluid">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li><a href="#">Getión de insumos</a></li>
                                                    <li><a href="#">Gestión de inspeccines</a></li>
                                                    <li><a href="#">Gestión de BPM </a></li>
                                                    <li><a href="#">Consultar histórico</a></li>
                                                    <li><a href="#">Reportes</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>                  
                                </div>    
                            </div>
                        </div>
                    </div>
                @endif

                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </div>
</body>
</html>
