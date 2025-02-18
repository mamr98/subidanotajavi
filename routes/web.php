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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/usuarios', [UserController::class,'all']);

/* Route::get('/', [TipoController::class, 'mostrar']); */

//Route::get('/laboratorio',[MuestraController::class,'index']);
Route::get('/laboratorio/crear',[MuestraController::class,'save']);

Route::post('/login',[UsuarioController::class,'login'])->name('login.post');

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

Route::get('/listamuestras',[MuestraController::class,'show'])->name('listamuestras');

Route::post('/listamuestras/create',[MuestraController::class,'create'])->name('crear.muestra');

Route::put('/listamuestras/update/{id}', [MuestraController::class, 'update']);

Route::get('/muestra/{id}',[MuestraController::class,'muestra']);

Route::delete('/listamuestras/destroy/{id}',[MuestraController::class,'destroy']);



Route::get('/listamuestras/tipo/{id}',[MuestraController::class,'tipo']);
Route::get('/listamuestras/formato/{id}',[MuestraController::class,'formato']);
Route::get('/listamuestras/calidad/{id}',[MuestraController::class,'calidad']);
Route::get('/listamuestras/usuario/{id}',[MuestraController::class,'usuario']);
Route::get('/listamuestras/sede/{id}',[MuestraController::class,'sede']);
Route::get('/listamuestras/tipoEstudio/{id}',[MuestraController::class,'tipoEstudio']);
Route::get('/listamuestras/tiposEstudio',[MuestraController::class,'tiposEstudios']);



Route::get('/muestrasadmin',[MuestraController::class,'showAdmin'])->name('muestrasadmin');



Route::get('/usuarios/{email}', [UsuarioController::class, 'buscarUsuario'])->name('usuarios.buscar');

Route::get('/muestras/{codigo}', [MuestraController::class, 'buscarMuestra'])->name('muestras.buscar');

Route::post('/pdf/{id}', [PdfController::class, 'generarPDF'])->name('generarPDF');
Route::post('/subir-imagen', [ImagenController::class, 'subirImagen'])->name('upload');
Route::get('/miperfil', [ImagenController::class, 'mostrarPerfil'])->name('perfil');