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


Route::get('/admin',[UsuarioController::class,'show']);

Route::post('/admin/create',[UsuarioController::class,'create']);

Route::delete('/admin/destroy/{email}',[UsuarioController::class,'destroy']);

Route::put('/admin/update/{email}',[UsuarioController::class,'update']);


Route::get('/laboratorio',[MuestraController::class,'welcome']);

