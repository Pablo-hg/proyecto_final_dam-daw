<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function clasificacion(Request $request)
    {
        //Página a mostrar
        $pagina = ($request->pagina) ? $request->pagina : 1;

        //Obtengo los datos a mostrar en el listado de datos
        $rowset = Datos::orderBy('record', 'ASC')->paginate(10,['*'],'pagina',$pagina);

        return view('admin.datos.index',[
            'rowset' => $rowset

        ]);
    }
    public function activar($usuario)
    {
        $row = Datos::findOrFail($usuario);
        $valor = ($row->activo) ? 0 : 1;
        $texto = ($row->activo) ? "desactivada" : "activada";

        Datos::where('usuario', $row->usuario)->update(['activo' => $valor]);

        return redirect('admin/clasificacion')->with('success', 'Noticia <strong>'.$row->titulo.'</strong> '.$texto.'.');
    }


    public function borrar($usuario)
    {
        $row = Usuarios::findOrFail($usuario);

        Datos::destroy($row->usuario);

        return redirect('admin/clasificacion')->with('success', 'Usuario <strong>'.$row->nombre.'</strong> borrado');
    }

    public function visible($usuario)
    {
        $row = Noticia::findOrFail($usuario);
        $valor = ($row->visible) ? 0 : 1;
        $texto = ($row->visible) ? "no se muestra en la home" : "se muestra en la home";

        Datos::where('usuario', $row->usuario)->update(['visible' => $valor]);

        return redirect('admin/clasificacion')->with('success', 'Datos <strong>'.$row->usuario.'</strong> '.$texto.'.');
    }
}
