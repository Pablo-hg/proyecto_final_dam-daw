@extends('layouts.admin')

@section('content')
    <div class="row cajita">
        <form class="col m12 20" method="POST" action="{{ route('autenticar') }}">
            @csrf
            <div class="row">
                <h2>Inicio Sesión</h2>
                <div class="input-field col s12">
                    <input id="email" type="text" name="email" value="">
                    <label for="email">Nombre de Usuario / Correo</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" value="">
                    <label for="password">Contraseña</label>
                </div>
                <div class="input-field col s12">
                    <button class="btn btn-large waves-effect waves-light" type="submit">
                        <i class="material-icons">arrow_forward</i>
                    </button>
                    <p>
                        <a href="{{ route('registro') }}" title="Registrarse" class="crearcuenta">Crear una cuenta</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection
