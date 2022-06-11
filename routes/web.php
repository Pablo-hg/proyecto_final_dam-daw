<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Front-end
Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('clasificacion', [AppController::class, 'clasificacion'])->name('clasificacion');
Route::get('comojugar', [AppController::class, 'comojugar'])->name('comojugar');
Route::get('equipo', [AppController::class, 'equipo'])->name('equipo');
Route::get('foro', [AppController::class, 'foro'])->name('foro');
Route::get('acercade', [AppController::class, 'acercade'])->name('acercade');
Route::get('jugar', [AppController::class, 'jugar'])->name('jugar');
Route::get('jugador/{id}', [AppController::class, 'jugador'])->name('jugador');


//BACK-END
Route::get('admin', [AdminController::class, 'index'])->name('admin');

//Usuarios middleware consulta si el la clomuna admin tiene 1
Route::get('admin/usuarios', [UsuariosController::class, 'index'])->middleware('role:admin');
Route::get('admin/usuarios/activar/{id}', [UsuariosController::class, 'activar'])->middleware('role:admin');
Route::get('admin/usuarios/borrar/{usuario}', [UsuariosController::class, 'borrar'])->middleware('role:admin');
Route::get('admin/usuarios/editar/{usuario}', [UsuariosController::class, 'editar'])->middleware('role:admin');
Route::get('admin/usuarios/crear', [UsuariosController::class, 'crear'])->middleware('role:admin');
Route::post('admin/usuarios/guardar', [UsuariosController::class, 'guardar'])->middleware('role:admin');
Route::post('admin/usuarios/actualizar/{id}', [UsuariosController::class, 'actualizar'])->middleware('role:admin');

//Partidas
Route::get('admin/clasificacion', [DatosController::class, 'clasificacion'])->name('clasificacion');
Route::get('admin/clasificacion/activar/{usuario}', [DatosController::class, 'activar'])->middleware('role:admin');
Route::get('admin/clasificacion/visible/{usuario}', [DatosController::class, 'visible'])->middleware('role:admin');
Route::get('admin/clasificacion/borrar/{usuario}', [DatosController::class, 'borrar'])->middleware('role:admin');

//Auth
Route::get('acceder', [AuthController::class, 'acceder'])->name('acceder');
Route::post('autenticar', [AuthController::class, 'autenticar'])->name('autenticar');
Route::get('registro', [AuthController::class, 'registro'])->name('registro');
Route::post('registrarse', [AuthController::class, 'registrarse'])->name('registrarse');
Route::post('salir', [AuthController::class, 'salir'])->name('salir');

//API Datos
Route::get('mostrardatos', [AppController::class, 'mostrardatos'])->name('mostrardatos');
Route::get('mostrarusuarios', [AppController::class, 'mostrarusuarios'])->name('mostrarusuarios');
Route::get('leer', [AppController::class, 'leer'])->name('leer');

//Api
Route::get('verClasificacion', [ApiController::class, 'verClasificacion'])->name('verClasificacion');
Route::get('verUsuario', [ApiController::class, 'verUsuario'])->name('verUsuario');
Route::post('comprobarUsuario', [ApiController::class, 'comprobarUsuario'])->name('comprobarUsuario');
Route::get('verPartida', [ApiController::class, 'verPartida'])->name('verPartida');
Route::post('crearPartida', [ApiController::class, 'crearPartida'])->name('crearPartida');



//Ruta por defecto (si no encuentra otra antes)
//Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');

