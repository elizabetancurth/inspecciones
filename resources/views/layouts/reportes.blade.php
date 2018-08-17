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
        <div class="card-body container container-fluid align-middle">
            <div id="bar-menu">
                <div class="row align-middle">
                    <div class="col col-md-2">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/images/logo.png">
                        </a>
                    </div>
                
                    <div class="col">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <h1>Gestión de Inspecciones </h1>
                            <h3>Unidad de Seguridad y Salud en el Trabajo</h3> 
                        </a>
                    </div>
                </div>
            </div>  
        </div>
        <!-- End of Header -->

        <div class="container">
        

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