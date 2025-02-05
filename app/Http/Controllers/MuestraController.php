<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuestraController extends Controller
{
    function index(){
        return view('welcome');

    }

    public function create(Request $request)
    {
        $muestra= new Muestra();
        $muestra->fecha = $request->input('fecha');
        $muestra->codigo = $request->codigo('fecha');
        $muestra->organo = $request->input('organo');
        $muestra->idTipo = $request->input('idTipo');
        $muestra->idFormato = $request->input('idFormato');
        $muestra->idCalidad = $request->input('idCalidad');
        $muestra->idUsuario = $request->input('idUsuario');
        $muestra->idSede = $request->input('idSede');
    
        $muestra->save();

        return response()->json(['mensaje' => 'Usuario creado correctamente'], 201);

    }

    public function show()
    {
        $muestras = Muestras::all();
        return view('muestrasadmin')->with(['muestras'=>$muestras,]);
    }
}
