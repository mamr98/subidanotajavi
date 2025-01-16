<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Muestras;

class TipoController extends Controller
{
    function mostrar(){
            $muestras = Muestra::all();

            return view('welcome')->with(['muestras'=>$muestras]);
        }
    }
