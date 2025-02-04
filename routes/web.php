<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UsuarioController;

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


Route::post('/admin/create',[UsuarioController::class,'create']);

Route::delete('/admin/destroy/{email}',[UsuarioController::class,'destroy']);

Route::put('/admin/update/{email}',[UsuarioController::class,'update']);


Route::post('/login',[UsuarioController::class,'login'])->name('login.post');

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');


Route::get('/laboratorio',[MuestraController::class,'index']);

Route::get('/interpretaciones', function () {
    return view('interpretaciones');
})->name('interpretaciones');

Route::get('/muestras', function () {
    return view('muestras');
})->name('muestras');