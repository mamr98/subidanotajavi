<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MuestrasController;
use App\Http\Controllers\InterpretacionesController;
use App\Http\Controllers\SubidaImagenesController;

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/ini', function () {
    return view('inicioadminlte');
});

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/usuarios', [UserController::class,'all']);

/* Route::get('/', [TipoController::class, 'mostrar']); */

//Route::get('/laboratorio',[MuestraController::class,'index']);
Route::get('/laboratorio/crear',[MuestraController::class,'save']);

Route::post('/login',[UsuarioController::class,'login'])->name('login.post');
Route::post('/registro',[UsuarioController::class,'registro'])->name('registro.post');

Route::get('/sedes', [UsuarioController::class,'show']);

Route::post('/laboratorio',[MuestraController::class,'welcome'])->name('welcome');
    
Route::get('/admin',[UsuarioController::class,'show'])->name('administrador');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


Route::post('/admin/create',[UsuarioController::class,'create'])->name('crear.usuario');

Route::delete('/admin/desactivar/{id}',[UsuarioController::class,'desactivar']);

Route::delete('/admin/activar/{id}',[UsuarioController::class,'activar']);

Route::put('/admin/update/{id}', [UsuarioController::class, 'update']);


Route::get('/admin/{id}',[UsuarioController::class,'usuario']);


Route::post('/login',[UsuarioController::class,'login'])->name('login.post');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


Route::get('/laboratorio',[MuestraController::class,'index']);

Route::get('/interpretaciones',[InterpretacionesController::class,'index'])->name('interpretaciones');/* junto al index ($amils) */

Route::get('/sede/{id}',[UsuarioController::class,'sedeUsuario']);


Route::post('/guardar_imagen', [MuestraController::class, 'guardarImagen']);

Route::delete('/eliminar_imagen/{id}', [MuestraController::class, 'eliminar_imagen']);


Route::get('/muestra/{id}',[MuestraController::class,'muestra']);


// Si estás utilizando rutas API
 
Route::get('/muestrasadmin',[MuestraController::class,'showAdmin'])->name('muestrasadmin');

Route::get('/usuarios/{email}', [UsuarioController::class, 'buscarUsuario'])->name('usuarios.buscar');

Route::get('/muestras/{codigo}', [MuestraController::class, 'buscarMuestra'])->name('muestras.buscar');

Route::post('/pdf/{id}', [PdfController::class, 'generarPDF'])->name('generarPDF');
Route::post('/subir-imagen', [ImagenController::class, 'subirImagen'])->name('upload');
Route::get('/miperfil', [ImagenController::class, 'mostrarPerfil'])->name('perfil');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');