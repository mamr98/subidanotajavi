<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterpretacionesController extends Controller
{
    public function index(){

        return redirect()->route('interpretaciones'); 
}
}
