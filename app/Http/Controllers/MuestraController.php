<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Tipo;
use App\Models\Calidad;
use App\Models\Formato;
use App\Models\Muestra;
use App\Models\Usuario;
use Illuminate\Http\Request;

class MuestraController extends Controller
{
    function index(){
        return view('welcome');

    }

    public function create(Request $request)
{
    $muestra = new Muestra();
    $muestra->fecha = $request->input('fecha');
    $muestra->codigo = $request->input('codigo');
    $muestra->organo = $request->input('organo');
    $muestra->idTipo = $request->input('idTipo');
    $muestra->idFormato = $request->input('idFormato');
    $muestra->idCalidad = $request->input('idCalidad');
    $muestra->idUsuario = $request->input('idUsuario');
    $muestra->idSede = $request->input('idSede');

    $muestra->save();

    return response()->json(['mensaje' => 'Muestra creada correctamente'], 201);
}


    public function show()
    {
        $muestras = Muestra::all();
        return view('listamuestras')->with(['muestras'=>$muestras]);
    }

    public function update(Request $request, $id)
    {
        $muestra = Muestra::find($id);
    
        $muestra->fecha = $request->input('fecha');
        $muestra->codigo = $request->input('codigo');
        $muestra->organo = $request->input('organo');
        $muestra->idTipo = $request->input('idTipo');
        $muestra->idFormato = $request->input('idFormato');
        $muestra->idCalidad = $request->input('idCalidad');
        $muestra->idUsuario = $request->input('idUsuario');
        $muestra->idSede = $request->input('idSede');

        
        $muestra->save();
    
        return response()->json(['mensaje' => 'Muestra actualizado correctamente'], 200);
    }

    public function destroy($id)
    {
        $muestra = Muestra::where('id', $id)->first();
        $muestra->delete(); 
        return response()->json(['mensaje' => 'Muestra eliminada correctamente'], 201);
    }

    public function tipo($id)
    {
        $tipo = Tipo::where('id', $id)->first();
        return $tipo;
    }

    public function formato($id)
    {
        $formato = Formato::where('id', $id)->first();
        return $formato;
    }

    public function calidad($id)
    {
        $calidad = Calidad::where('id', $id)->first();
        return $calidad;
    }

    public function usuario($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        return $usuario;
    }

    public function sede($id)
    {
        $sede = Sede::where('id', $id)->first();
        return $sede;
    }

    public function muestra($id){
        $muestra = Muestra::where('id', $id)->first();
        return response()->json($muestra,200);
    }
}

