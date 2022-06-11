@extends('layouts.admin')

@section('content')

    <div class="row cajita2">
        <form class="col m12 20" method="POST" action="{{ route('registrarse') }}">
            @csrf
            <div class="row">
                <h2>Crea una cuenta</h2>
                <div class="input-field col s12">
                    <input id="nombre" type="text" name="usuario" value="" required autofocus>
                    <label for="nombre">Nombre de Usuario</label>
                </div>
                <div class="input-field col s12">
                    <input id="email" type="text" name="email" value="" required>
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s12">
                    <input id="password" type="password" name="password" value="" required>
                    <label for="password">Contraseña</label>
                </div>
                <div class="input-field col s12">

                    <input id="password-confirm" type="password" name="password_confirmation" value="" required>
                    <label for="password-confirm">Repetir contraseña</label>
                </div>

                <div class="input-field col s12">
                    <a href="{{ route('admin') }}" title="Volver">
                        <button class="btn btn-large" type="button">
                            <i class="material-icons right">undo</i>
                        </button>
                    </a>
                    <button class="btn btn-large waves-effect waves-light" type="submit">
                        <i class="material-icons">arrow_forward</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

