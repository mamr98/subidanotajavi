<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuestraController extends Controller
{
    function index(){
        return view('laboratorio');

    }
}
