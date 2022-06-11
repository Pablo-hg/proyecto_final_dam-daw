@extends('layouts.admin')
<!--UWU-->
@section('content')
    <h3>
        @if ($row->usuario)
            <span>Editar {{ $row->usuario }}</span>
        @else
            <span>Nuevo usuario</span>
        @endif
    </h3>
    <div class="card admin" style="margin-top:10px;width:1550px;height: 1040px">
    <div class="col m12 l6 center-align">
        @if ($row->imagen)
            {{ Html::image('img/'.$row->imagen, $row->titulo, ['class' => 'responsive-img']) }}
        @endif
    </div>
    <div class="row">
        @php $accion = ($row->id) ? "actualizar/".$row->id : "guardar" @endphp
        <form class="col m12 l6" method="POST" action="{{ url("admin/usuarios/".$accion) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s10" style="padding-left: 30px">
                    <input id="usuario" type="text" name="usuario" value="{{ $row->usuario }}">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="input-field col s10" style="padding-left: 30px">
                    <input id="email" type="text" name="email" value="{{ $row->email }}">
                    <label for="email">E-mail</label>
                </div>
                <div class="input-field col s10" style="padding-left: 30px">
                    <br>
                <label for="biografia">Biografia</label>
                <textarea name="biografia" id="biografia" style="width: 45rem; height: 15rem">{{ $row->biografia }}</textarea>
                </div>
                @php $clase = ($row->usuario) ? "hide" : "" @endphp
                <div class="input-field col s12 {{ $clase }}" id="password">
                    <input id="password" type="password" name="password" value="">
                    <label for="password">Contraseña</label>
                </div>
                @if ($row->usuario)
                    <p>
                        <label for="cambiar_clave">
                            <input id="cambiar_clave" name="cambiar_clave" type="checkbox">
                            <span>Pulsa para cambiar la clave</span>
                        </label>
                    </p>
                @else
                    <input type="hidden" name="cambiar_clave" value="1">
                @endif
            </div>
            <div class="row">
                <p>Permisos</p>
                <p>
                    <label for="admin">
                        <input id="admin" name="admin" type="checkbox" {{ ($row->admin == 1) ? "checked" : "" }}>
                        <span>Admin</span>
                    </label>
                </p>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagen</span>
                        <input type="file" name="imagen">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="input-field col s12">
                    <a href="{{ url("admin/usuarios") }}" title="Volver">
                        <button class="btn waves-effect waves-light" type="button">Volver
                            <i class="material-icons right">replay</i>
                        </button>
                    </a>
                    <button class="btn waves-effect waves-light" type="submit" name="guardar">Guardar
                        <i class="material-icons right">save</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
