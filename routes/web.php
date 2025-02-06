<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InterpretacionesController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/usuarios', [UserController::class,'all']);

/* Route::get('/', [TipoController::class, 'mostrar']); */

//Route::get('/laboratorio',[MuestraController::class,'index']);
Route::get('/laboratorio/crear',[MuestraController::class,'save']);

Route::post('/login',[UsuarioController::class,'login'])->name('login.post');

Route::get('/laboratorio',[MuestraController::class,'welcome'])->name('welcome');
    
Route::get('/admin',[UsuarioController::class,'show'])->name('administrador');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


Route::post('/admin/create',[UsuarioController::class,'create'])->name('crear.usuario');;

Route::delete('/admin/desactivar/{id}',[UsuarioController::class,'desactivar']);

Route::delete('/admin/activar/{id}',[UsuarioController::class,'activar']);

Route::put('/admin/update/{id}', [UsuarioController::class, 'update']);


Route::get('/admin/{id}',[UsuarioController::class,'usuario']);


Route::post('/login',[UsuarioController::class,'login'])->name('login.post');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


Route::get('/laboratorio',[MuestraController::class,'index']);

Route::get('/interpretaciones',[InterpretacionesController::class,'index($amils)'])->name('interpretaciones');

Route::get('/sede/{id}',[UsuarioController::class,'sedeUsuario']);

Route::get('/listamuestras', function () {
    return view('listamuestras');
})->name('listamuestras');

Route::get('/muestrasadmin', function () {
    return view('muestrasadmin');
})->name('muestrasadmin');

Route::get('/principal', function () {
    return view('principal');
})->name('principal');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');
