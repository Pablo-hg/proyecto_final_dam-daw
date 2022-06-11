
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--Metas-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Panel de administración">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Panel de administración') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <!--Logo-->
        <div class="logo">
            <a href="{{ route('home') }}" class="brand-logo" title="Inicio">
                {{ Html::image('img/Logo_Tab.png', 'Logo Crash Bandicoot') }}
                <span class="run">run</span>
                {{ Html::image('img/logo.png', 'Logo Crash Bandicoot',['class'=>'logotxt']) }}

            </a>
        </div>
        <!--Botón menú móviles-->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <!--Menú de navegación-->
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            @if( Auth::check() )
            <li>
                <a href="{{ route('home') }}" title="Inicio">Inicio</a>
            </li>
            <li>
                <a href="{{ url('admin/clasificacion') }}" title="Clasificación">Clasificación</a>
            </li>
            <li>
                @if( Auth::user()->admin )
                <a href="{{ url('admin/usuarios') }}" title="Usuarios">Usuarios</a>
                @endif
            </li>
            @else
                <li>
                    <a href="{{ route('home') }}" title="Inicio">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('comojugar') }}" title="Como jugar">Cómo jugar</a>
                </li>
                <li>
                <li>
                    <a href="{{ url('clasificacion') }}" title="Clasificación">Clasificación</a>
                </li>
                <li>
                    <a href="{{ route('equipo') }}" title="Equipo">Equipo</a>
                </li>
                <li>
                    <a href="{{ route('acercade') }}" title="Acerca de">Acerca de</a>
                </li>
            @endif
        </ul>
        <div class="navderecha">
            <a href="{{ route('jugar') }}" title="Jugar" target="_blank" class="jugar">Jugar</a>
            <a href="{{ route('admin') }}" title="Acceder" class="acceder">
                @if( Auth::check() ) Perfil
                @else Acceder
                @endif
            </a>

        </div>
    </div>
</nav>
<svg>
    <polygon points="0,0 1920,0 1920,10 0,20" fill="#0081cc"/>
</svg>

@if( Auth::check() )
    <!--Menú de navegación móvil-->
    <ul class="sidenav" id="mobile-demo">
        <li>
            <a href="{{ route('admin') }}" title="Inicio">Inicio</a>
        </li>
        @if( Auth::user()->usuarios )
            <li>
                <a href="{{ url('admin/usuarios') }}" title="Usuarios">Usuarios</a>
            </li>
        @endif

    </ul>
@endif

<!-- Mensajes  -->
@include('admin.partials.mensajes')
<?php  url('admin/usuarios')?>
<main class="iniciosesion">

<section class="container-fluid">
<!--Content-->
@yield('content')
</section>

</main>

<!--Footer-->
<footer class="center-align">
© <?php echo date("Y") ?> Panel de Administración.
<a href="https://jairogarciarincon.com" target="_blank" title="Jairo García Rincón">
Crash Bandicoot
</a>
</footer>

</body>

<!--Scripts-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{ asset('js/admin.js') }}" defer></script>

</html>
