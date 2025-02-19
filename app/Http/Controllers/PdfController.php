<?php

namespace App\Http\Controllers;

use Dompdf\Options;
use App\Models\Imagen;
use App\Models\Muestra;
use App\Models\TipoEstudio;
use Illuminate\Http\Request;
use App\Models\Interpretacion;
use App\Models\MuestrasInterpretacion;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PdfController extends Controller
{
    public function generarPDF($id){
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

        $imagen = Imagen::where('idMuestras', $muestra->id)->get();

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $pdf = PDF::loadView('pdf', compact('muestra','interpretaciones_detalladas', 'tipoEstudio', 'imagen'));
        $pdf->getDomPDF()->setOptions($options);

        return $pdf->download('muestras_'.$muestra->codigo.'.pdf');        
    }
}
