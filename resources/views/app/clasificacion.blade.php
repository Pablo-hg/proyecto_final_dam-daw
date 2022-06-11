@extends('layouts.app')

@section('content')
@php $num= (($rowset->currentPage()-1)*10)+1; @endphp
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
                            <a href="{{ url('/jugador/'.$row->usuario) }}" title={{ $row->usuario }}>
                                <i class="material-icons">open_in_new</i>
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
