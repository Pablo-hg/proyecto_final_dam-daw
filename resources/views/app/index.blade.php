
@extends('layouts.app')

@section('content')

<section class="cabecera">
    <div class="video">
        <video height="775" loop autoplay muted>
            <source src="{{asset('img/gameplay.mp4')}}" type="video/mp4">
        </video>
    </div>
    <div class="jugarya">
        <p>¡Únete a Crash Bandicoot en una misión para recorrer el mundo!</p>
        {{ Html::image('img/logo.png', 'Logo Crash Bandicoot') }}
        <!--Si estoy seteado, es un enlace-->
        @if( Auth::check() )
            <a href="{{ route('jugar') }}" title="Jugar" target="_blank" class="jugargratis">Jugar gratis</a>
        <!--Si no estoy seteado, abro un div con botones-->
        @else
            <button onclick="abrirDiv()" class="btjugar">Jugar gratis</button>
        @endif
    </div>
</section>
<div align="center" class="card-panel teal" id="hola">
    <button onclick="cerraDiv()" class="cerrar">
        <i class="material-icons">clear</i>
    </button>
    <div class="contenidovent">
        <h3>Preparate para jugar</h3><br>
        <div class="botones">
            <div class="bt1" style="width: 28%"><br>
                <span style="font-size: 15px">Aún no tengo una cuenta</span><br>
                <a href="{{ route('registro') }}" class="boton" style="font-size: 15px">Crear una cuenta</a>
            </div>
            <div class="bt2" style="width: 28%"><br>
                <span style="font-size: 15px;">Tengo cuenta</span>
                <a href="{{ route('admin') }}" style="font-size: 15px">Iniciar sesión</a>
            </div>
        </div>
    </div>
</div>

@endsection
