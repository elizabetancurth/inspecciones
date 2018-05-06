@extends('layouts.login')

@section("headerTitle", "Ingreso al sistema")

@section('content')

<div class="card">
    <div class="card-header">
        Inicio de Sesión
    </div>

    <div class="card-body">
        <div class="row justify-content-center container-fluid">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                    <div class="col">
                    <label for="email" class="text-md-right">
                        Usuario:
                    </label>
                    </div>
                    <div class="col col-md-8">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                </div><br>

                <div class="row">
                <div class="col">
                    <label for="password" class="col-form-label text-md-right">Contraseña:</label>
                    </div>
                    <div class="col col-md-8">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Iniciar sesión
                        </button>
                    </div>
                </div>
            </form> 
        </div>              
    </div>
</div>
@endsection
