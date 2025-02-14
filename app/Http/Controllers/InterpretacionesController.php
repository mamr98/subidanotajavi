<?php

namespace App\Http\Controllers;

use App\Models\Calidad;
use App\Models\Interpretacion;
use App\Models\Sede;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InterpretacionesController extends Controller
{
    public function index(){

        return view('interpretaciones'); 
}



    function create(Request $request){

        $interpretacion = new Interpretacion();

        $interpretacion->calidad = $request->input('calidad');
        $interpretacion->descripcionCalidad = $request->input('descripcionCalidad');
        $interpretacion->interpretacionMuestra = $request->input('interpretacionMuestra');
        $interpretacion->descripcionInterpretacion = $request->input('descripcionInterpretacion');

        $interpretacion->save();

        return response()->json(['mensaje' => 'Interpretación creada correctamente'],201);
        
    }

    function show(){
        
        $interpretacion = Interpretacion::paginate(10);
        $calidad = Calidad::all();
        $usuarios = Usuario::all();
        $sedes = Sede::all();

        /* return view('interpretaciones')-with([
            'interpretacion' => $interpretacion,
            'calidad' => $calidad,
        ]); */

    }

    function update(){
        
    }

    function delete(){
        
    }

    









}
