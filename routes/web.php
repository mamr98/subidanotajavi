<?php

use App\Http\Controllers\TipoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('');
// });

Route::get('/usuarios', [UserController::class,'all']);

Route::get('/', [TipoController::class, 'mostrar']);

Route::get('/laboratorio', function () {
    return view('laboratorio');
});