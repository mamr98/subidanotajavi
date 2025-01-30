<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MuestraController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('login');
});

Route::get('/usuarios', [UserController::class,'all']);

/* Route::get('/', [TipoController::class, 'mostrar']); */

//Route::get('/laboratorio',[MuestraController::class,'index']);
Route::get('/laboratorio/crear',[MuestraController::class,'save']);
Route::get('/admin',[UsuarioController::class,'index']);
Route::get('/laboratorio',[MuestraController::class,'welcome']);

