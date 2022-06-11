<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController
{
    public function comprobarUsuario (Request $request) {

        $email = $request->email;
        $password = $request->password;

        $user = Usuarios::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function verUsuario(){
        return view('api.partida');
    }

    public function verPartida(){
        return view('api.crearPartida');
    }

    public function crearPartida(Request $request){

        $row = Usuarios::where('email', $request->email)->first();

        $datos = Datos::where('usuario', $row->usuario)->first();
        if($datos){
            Datos::where('usuario', $datos->usuario)->update([
                'frutas' => $request->frutas,
            ]);
        }
        else {
            Datos::create([
                'usuario' => $row->usuario,
                'frutas' => $request->frutas,
                'recha_registro' => $request->fecha,
            ]);
            echo "partida añadida";
        }
    }

    public function verClasificacion(){
        $rowset = Datos::orderBy('frutas', 'DESC')->limit(5)->get();

        foreach ($rowset as $row){
            $datos[] = [
                'usuario' => $row->usuario,
                'frutas' => $row->frutas,
                'enemigos' => $row->enemigos,
                'numero_partidas' => $row->numero_partidas,
                'record' => $row->record,
                'fecha_record' => date("d/m/Y", strtotime($row->fecha_record)),
            ];
        }

        //Devuelvo JSON
        return response()->json(
            $datos, //Array de objetos
            200, //Tipo de respuesta
            [], //Headers
            //dejaro bonito             barras                   tildes
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE //Opciones de escape
        );
    }


}
