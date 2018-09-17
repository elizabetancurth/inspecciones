@extends('layouts.app')

@section("headerTitle", "Editar Usuario")

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                {{ Form::model($usuario, ['route' => ['usuarios.update', $usuario], 'method' => 'post']) }}
                    @method('put')

                    <div class="form-group row">
                        <label for="name" class="col-md-5 col-form-label text-md-right">Nombres</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $usuario->name }}" >

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-md-5 col-form-label text-md-right">Apellidos</label>

                        <div class="col-md-6">
                            <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $usuario->lastname }}" >

                            @if ($errors->has('lastname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-5 col-form-label text-md-right">Correo Electrónico</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $usuario->email }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-5 col-form-label text-md-right">Contraseña</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-5 col-form-label text-md-right">Confirmar Contraseña</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-5 col-form-label text-md-right">
                            {!! Form::label("rol", "Rol:") !!}
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('rol', ['Administrador' => 'Administrador', 'APH' => 'APH'], $usuario->rol, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-5 col-form-label text-md-right">
                            {!! Form::label("estado", "Estado:") !!}
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $usuario->estado, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
