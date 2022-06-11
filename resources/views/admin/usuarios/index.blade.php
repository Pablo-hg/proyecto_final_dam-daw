@extends('layouts.admin')

@section('content')
    <!--     background-image: url(http://3.143.248.187/proyecto_final_dam-daw/public/img/fondo_iniciarSe.png); -->


    <h3>
        <a href="{{ route("admin") }}" title="Inicio">Inicio</a> <span>| Usuarios</span>
    </h3>
    <div class="row">
        <!--Nuevo-->
        <article class="col s12 l6" style="width: 50%">
            <div class="card horizontal admin" style="height: 360px">
                <div class="card-stacked">
                    <div class="card-content">
                        <i class="grey-text material-icons medium">person</i>
                        <h4 class="grey-text">
                            nuevo usuario
                        </h4>
                    </div>

                    <div class="card-action">
                        <a href="{{ url("admin/usuarios/crear") }}" title="Añadir nuevo usuario">
                            <i class="material-icons">add_circle</i>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        @foreach ($rowset as $row)
            <article class="col s12 l6" style="width: 50%">
                <div class="card horizontal  sticky-action admin">
                    <div class="card-stacked">
                        @php
                            $fechahoy = date('Y-m-d', time());
                        @endphp
                        @if($fechahoy==$row->fecha_registro)
                            <span style="float:right;color:red">Nuevo</span>
                        @endif
                        <div class="card-content">
                            @php
                            $imagen = ($row->imagen == "") ? 'person' : $row->imagen;
                            $color = ($row->activo == 1) ? "green-text" : "red-text";
                            $icono = ($row->activo == 1) ? "visibility" : "visibility_off";
                            @endphp
                            <h4>
                                {{ $row->nombre }}
                            </h4>
                            <div style="margin-left: 10px">
                                <strong>Admin: </strong>{{ ($row->admin) ? "Sí" : "No" }}<br>
                                <strong>Usuario: </strong>{{ ($row->usuario) }}<br>
                                <strong>Email: </strong>{{ ($row->email) }}<br><?php
                                if($imagen=='person'){  ?>
                                <i class="material-icons medium">person</i> <?php
                                }else{
                                ?> <div style="padding-bottom: 130px">{{ Html::image('img/'.$row->imagen, $row->titulo,['style'=>'width: 80%; height: 80%']) }}</div> <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="{{ url("admin/usuarios/editar/".$row->usuario) }}" title="Editar">
                                <i class="material-icons">edit</i>
                            </a>
                            @php
                                $title = ($row->activo == 1) ? "Desactivar" : "Activar";
                                $color = ($row->activo == 1) ? "green-text" : "red-text";
                                $icono = ($row->activo == 1) ? "visibility" : "visibility_off";
                            @endphp
                            <a href="{{ url("admin/usuarios/activar/".$row->id) }}" title="{{ $title }}">
                                <i class="{{ $color }} material-icons">{{ $icono }}</i>
                            </a>
                            <a href="#" class="activator" title="Borrar">
                                <i class="material-icons">delete_forever
                                </i>
                            </a>
                        </div>
                    </div>
                    <!--Confirmación de borrar-->
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Borrar usuario<i class="material-icons right">close</i></span>
                        <p>
                            ¿Está seguro de que quiere borrar al usuario<strong>@php echo $row->usuario @endphp</strong>?<br>
                            Esta acción no se puede deshacer.
                        </p>
                        <a href="{{ url("admin/usuarios/borrar/".$row->id) }}" title="Borrar">
                            <button class="btn waves-effect waves-light" type="button">Borrar
                                <i class="material-icons right">delete_forever
                                </i>
                            </button>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
