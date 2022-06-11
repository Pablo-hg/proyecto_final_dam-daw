@extends('layouts.app')

@section('content')
    @php $num= ($rowset->currentPage()-1)*10+1; @endphp
    <h3 align="center"> TABLAS DE CLASIFICACIÓN </h3>
    <div class="row">
        <table class="striped centered">
            <thead>
            <tr>
                <th>Posición</th>
                <th>Usuario</th>
                <th>Frutas</th>
                <th>Enemigos</th>
                <th>Nº partidas</th>
                <th>Record</th>
                <th>Fecha record</th>
                <th></th>
            </tr>
            </thead>
            @foreach ($rowset as $row)
                <tr>
                    <td>{{ $num++}}</td>
                    <td>{{ $row->usuario  }}</td>
                    <td>{{ $row->frutas  }}</td>
                    <td>{{ $row->enemigos  }}</td>
                    <td>{{ $row-> numero_partidas }}</td>
                    <td>{{ $row->record  }}m</td>
                    <td>{{ $row->fecha_record  }}</td>
                    <td>
                        @php
                            $title = ($row->activo == 1) ? "Desactivar" : "Activar";
                            $color = ($row->activo == 1) ? "green-text" : "red-text";
                            $icono = ($row->activo == 1) ? "visibility" : "visibility_off";
                        @endphp
                        <a href="{{ url("admin/clasificacion/activar/".$row->usuario) }}" title="{{ $title }}">
                            <i class="{{ $color }} material-icons">{{ $icono }}</i>
                        </a>
                        @php
                            $title2 = ($row->visible == 1) ? "Quitar de la home" : "Mostrar en la home";
                            $color2 = ($row->visible == 1) ? "green-text" : "red-text";
                            $icono2 = ($row->activo == 1) ?  "mood" : "mood_bad";;
                        @endphp
                        <a href="#" title="{{ $title2 }}">
                            <i class="{{ $color2 }} material-icons">{{$icono2}}</i>
                        </a>
                        <a href="#" class="activator" title="Borrar">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
        <!--Paginación-->
        <div class="row paginado">
            {{ $rowset->links() }}
        </div>
    </div>
@endsection
