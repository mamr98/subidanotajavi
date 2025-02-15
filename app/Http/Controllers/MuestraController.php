<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Tipo;
use App\Models\Calidad;
use App\Models\Formato;
use App\Models\Muestra;
use App\Models\Usuario;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;
use App\Models\Interpretacion;
use App\Models\MuestrasInterpretacion;

class MuestraController extends Controller
{
    function index(){
        return view('welcome');

    }

    public function create(Request $request)
{
    // Crear y guardar la muestra
    $muestra = new Muestra();
    $muestra->fecha = $request->input('fecha');
    $muestra->codigo = $request->input('codigo');
    $muestra->organo = $request->input('organo');
    $muestra->idTipo = $request->input('idTipo');
    $muestra->idFormato = $request->input('idFormato');
    $muestra->idCalidad = $request->input('idCalidad');
    $muestra->idUsuario = $request->input('idUsuario');
    $muestra->idSede = $request->input('idSede');
    $muestra->save();  // Guardamos la muestra antes de usar su ID

    // Crear y guardar la interpretación
    $interpretacion = new Interpretacion();
    $interpretacion->texto = $request->input('descripcion');
    $interpretacion->idTipoEstudio = $request->input('idTipoEstudio');
    $interpretacion->save();  // Guardamos antes de usar su ID

    // Crear y guardar la relación en la tabla pivot
    $muestra_interpretacion = new MuestrasInterpretacion();
    $muestra_interpretacion->calidad = 'hola';
    $muestra_interpretacion->idMuestras = $muestra->id;  // Ahora sí tiene un ID
    $muestra_interpretacion->idInterpretacion = $interpretacion->id;  // Error corregido
    $muestra_interpretacion->save();

    return response()->json(['mensaje' => 'Muestra creada correctamente'], 201);
}



public function show()
{
    $muestras = Muestra::paginate(10);
    $tipos = Tipo::all();
    $formatos = Formato::all();
    $calidades = Calidad::all();
    $usuarios = Usuario::all();
    $sedes = Sede::all();
    $interpretacion = Interpretacion::all();
    return view('listamuestras')->with([
        'muestras' => $muestras,
        'tipos' => $tipos,
        'formatos' => $formatos,
        'calidades' => $calidades,
        'usuarios' => $usuarios,
        'sedes' => $sedes,
        'interpretacion' => $interpretacion,
    ]);
}


    public function showAdmin()
    {
        $muestras = Muestra::paginate(10);
        $tipos = Tipo::all();
        $formatos = Formato::all();
        $calidades = Calidad::all();
        $usuarios = Usuario::all();
        $sedes = Sede::all();
        $tipoEstudio = TipoEstudio::all();
    return view('muestrasadmin')->with([
        'muestras' => $muestras,
        'tipos' => $tipos,
        'formatos' => $formatos,
        'calidades' => $calidades,
        'usuarios' => $usuarios,
        'sedes' => $sedes,
        'tipoEstudio' => $tipoEstudio,
    ]);
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
        $interpretacion = Interpretacion::where('id', $id)->first();
        return response()->json([
            'muestra' => $muestra,
            'interpretacion' => $interpretacion
        ], 200);
        
    }

    public function buscarMuestra($codigo)
{
    $muestras = Muestra::where('codigo', 'LIKE', "%{$codigo}%")->get();

    return response()->json($muestras, 200);
}
}

