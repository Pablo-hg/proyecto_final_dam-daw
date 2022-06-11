<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //home
    public function index()
    {
        return view('app.index',[

        ]);
    }

    public function comojugar()
    {
        return view('app.comojugar');
    }

    public function foro()
    {
        $rowset = Usuarios::where('estado_post', 1)->orderBy('fecha_post', 'DESC')->get();

        return view('app.foro',[
            'rowset' => $rowset,
        ]);
    }

    public function hilo($slug)
    {
        $row = Usuarios::where('estado_post', 1)->where('slug',$slug)->get();

        return view('app.hilo',[
            'row' => $row,
        ]);
    }

    public function clasificacion(Request $request)
    {
        //Página a mostrar
        $pagina = ($request->pagina) ? $request->pagina : 1;

        //Obtengo los datos a mostrar en el listado de datos
        $rowset = Datos::orderBy('record', 'DESC')->paginate(10,['*'],'pagina',$pagina);

        return view('app.clasificacion',[
            'rowset' => $rowset

        ]);
    }



    public function jugar()
    {
        return view('');
    }

    public function equipo()
    {
        return view('app.equipo');
    }

    public function acercade()
    {
        return view('app.acercade');
    }


    //Métodos para la API (podrían ir en otro controlador)

    public function mostrardatos(){

        //Obtengo las noticias a mostrar en el listado de noticias
        $rowset = Datos::orderBy('record', 'DESC')->get();
        //Opción rápida (datos completos)
        //$noticias = $rowset;

        //Opción personalizada
        foreach ($rowset as $row){
            $datos[] = [
                'usuario' => $row->usuario,
                'frutas' => $row->frutas,
                'enemigos' => $row->enemigos,
                'ult_distancia' => $row->ult_distancia,
                'fecha_record' => date("d/m/Y", strtotime($row->fecha_record)),
                'record' => $row->record,
                'numero_partidas' => $row->numero_partidas,
                'created_at' => date("d/m/Y", strtotime($row->created_at)),
                'updated_at' => date("d/m/Y", strtotime($row->updated_at)),
            ];
        }

        //Devuelvo JSON
        return response()->json(
            $datos, //Array de objetos
            200, //Tipo de respuesta
            [], //Headers
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE //Opciones de escape
        );

    }
    public function mostrarusuarios(){

        //Obtengo las noticias a mostrar en el listado de noticias
        $rowset = Usuarios::orderBy('created_at', 'DESC')->get();
        //Opción rápida (datos completos)
        //$noticias = $rowset;

        //Opción personalizada
        foreach ($rowset as $row){
            $datos[] = [
                'usuario' => $row->usuario,
                'email' => $row->email,
                'password' => $row->password,
                'imagen' => $row->imagen,
                'fecha_registro' => date("d/m/Y", strtotime($row->fecha_registro)),
                'biografia' => $row->biografia,
                'activo' => $row->activo,
                'admin' => $row->admin,
                'titulo_post' => $row->titulo_post,
                'texto_post' => $row->texto_post,
                'imagen_post' => $row->imagen_post,
                'estado_post' => $row->estado_post,
                'slug' => $row->slug,
                'fecha_post' => date("d/m/Y", strtotime($row->fecha_post)),
                'created_at' => date("d/m/Y", strtotime($row->created_at)),
                'updated_at' => date("d/m/Y", strtotime($row->updated_at)),
            ];
        }

        //Devuelvo JSON
        return response()->json(
            $datos, //Array de objetos
            200, //Tipo de respuesta
            [], //Headers
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE //Opciones de escape
        );

    }

    public function leer(){

        //Url de destino
        $url = route('mostrar');

        //Parseo datos a un array
        $rowset = json_decode(file_get_contents($url), true);

        //LLamo a la vista
        return view('api.leer',[
            'rowset' => $rowset,
        ]);
    }


    public function jugador($slug){

        $rowset = Usuarios::
        join('datos','datos.usuario', '=', 'usuarios.usuario')
            ->where('usuarios.usuario', $slug)
            ->get();

        if($rowset=="[]"){
            $rowset = Usuarios::where('usuario',$slug)->get();
        }
        return view('app.jugador',['rowset' => $rowset,]);


    }




}
