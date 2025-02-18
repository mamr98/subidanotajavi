<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Tipo;
use App\Models\Imagen;
use App\Models\Calidad;
use App\Models\Formato;
use App\Models\Muestra;
use App\Models\Usuario;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;
use App\Models\Interpretacion;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Resize;
use App\Models\MuestrasInterpretacion;
use Cloudinary\Transformation\Delivery;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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

public function guardarImagen(Request $request)
{
    $request->validate([
        'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $uploadResponse = Cloudinary::upload($request->file('imagen')->getRealPath(), [
        'folder' => 'prueba'
    ]);

    $publicID_image = $uploadResponse->getPublicId();

    // Construye la URL de la imagen con Cloudinary
    $url_image = (new \Cloudinary\Cloudinary())->image($publicID_image)
        ->resize(Resize::scale()->width(250))
        ->delivery(Delivery::quality(35))
        ->delivery(Delivery::format(Format::auto()));

        $id_muestra = (int)$request->input('idMuestras');
        $zoom = (int)$request->input('zoom');
        if (!$id_muestra) {
            return response()->json(['error' => 'ID de muestra no proporcionado'], 400);
        }
        
        $imagen = new Imagen();
        $imagen->ruta = $url_image;
        $imagen->zoom = $zoom;
        $imagen->idMuestras = $id_muestra; // Asegúrate de que esto sea un valor único, no un array
        $imagen->save();
        

    return response()->json(['nombre_archivo' => $publicID_image]);
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
    // Buscar la muestra por ID
    $muestra = Muestra::findOrFail($id);

    // Actualizar los campos de la muestra
    $muestra->update($request->only([
        'fecha', 'codigo', 'organo', 'idTipo', 'idFormato', 'idCalidad', 'idUsuario', 'idSede'
    ]));

    // Actualizar interpretaciones si existen en la solicitud
    if ($request->has('interpretaciones')) {
        foreach ($request->input('interpretaciones') as $interpretacionData) {
            if (!empty($interpretacionData['id'])) {
                Interpretacion::where('id', $interpretacionData['id'])
                    ->update([
                        'texto' => $interpretacionData['descripcion'] ?? '',
                        'idTipoEstudio' => $interpretacionData['tipoEstudio'] ?? null
                    ]);
            }
        }
    }

    return response()->json([
        'message' => 'Muestra actualizada correctamente',
        'muestra' => $muestra
    ]);
}


    public function destroy($id)
{
    // Buscar la muestra
    $muestra = Muestra::find($id);

    if (!$muestra) {
        return response()->json(['mensaje' => 'Muestra no encontrada'], 404);
    }

    // Obtener las IDs de las interpretaciones asociadas a la muestra
    $interpretacionesIds = MuestrasInterpretacion::where('idMuestras', $id)->pluck('idInterpretacion');

    // Eliminar las relaciones en la tabla MuestrasInterpretacion
    MuestrasInterpretacion::where('idMuestras', $id)->delete();

    // Ahora que las relaciones han sido eliminadas, podemos eliminar las interpretaciones
    Interpretacion::whereIn('id', $interpretacionesIds)->delete();

    // Finalmente, eliminar la muestra
    $muestra->delete();

    return response()->json(['mensaje' => 'Muestra e interpretaciones eliminadas correctamente'], 200);
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

    public function tipoEstudio($id)
    {
        $tipoEstudio = TipoEstudio::where('id', $id)->first();
        return $tipoEstudio;
    }

    public function muestra($id){
        // Obtener la muestra con el ID proporcionado
        $muestra = Muestra::where('id', $id)->first();
        
        // Obtener todas las interpretaciones asociadas a esa muestra con todos sus campos
        $muestra_interpretaciones = MuestrasInterpretacion::where('idMuestras', $id)->get();
    
        // Inicializar un arreglo para almacenar las interpretaciones detalladas
        $interpretaciones_detalladas = [];
    
        // Iterar sobre las interpretaciones obtenidas
        foreach ($muestra_interpretaciones as $interpretacion) {
            // Obtener detalles de la tabla Interpretacione para cada id
            $detalle_interpretacion = Interpretacion::where('id', $interpretacion->id)->first();

            $tipoEstudio = TipoEstudio::where('id', $detalle_interpretacion->idTipoEstudio)->first();
            
            // Agregar el detalle de la interpretación al arreglo
            if ($detalle_interpretacion) {
                $interpretaciones_detalladas[] = $detalle_interpretacion;
            }
        }
    
        // Retornar la muestra y las interpretaciones detalladas en formato JSON
        return response()->json([
            'muestra' => $muestra,
            'interpretaciones' => $interpretaciones_detalladas,
            'tipoEstudio' => $tipoEstudio,
        ], 200);
    }
    
    
    

    public function buscarMuestra($codigo)
{
    $muestras = Muestra::where('codigo', 'LIKE', "%{$codigo}%")->get();

    return response()->json($muestras, 200);
}

public function tiposEstudios(){
    $tipoEstudio = TipoEstudio::all();

    return $tipoEstudio;

}
}

