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
   $muestra->save(); // Guardamos la muestra para obtener su ID

   // Obtener las interpretaciones del request
   $interpretaciones = $request->input('interpretaciones');

   // Verificar si hay interpretaciones antes de iterar
   if ($interpretaciones) {
       foreach ($interpretaciones as $interpretacionData) {
           // Crear y guardar la interpretación
           $interpretacion = new Interpretacion();
           $interpretacion->texto = $interpretacionData['descripcion'];
           $interpretacion->idTipoEstudio = $interpretacionData['idTipoEstudio'];
           $interpretacion->save(); // Guardamos la interpretación para obtener su ID

           // Crear y guardar la relación en la tabla pivote
           $muestra_interpretacion = new MuestrasInterpretacion();
           $muestra_interpretacion->calidad = 'hola'; // Puedes obtener este valor de otro input si lo necesitas
           $muestra_interpretacion->idMuestras = $muestra->id; // Usamos el ID de la muestra guardada
           $muestra_interpretacion->idInterpretacion = $interpretacion->id; // Usamos el ID de la interpretación guardada
           $muestra_interpretacion->save();
       }
   }

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

