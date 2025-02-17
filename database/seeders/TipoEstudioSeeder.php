<?php

namespace Database\Seeders;

use App\Models\TipoEstudio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposEstudio = [
            ['nombre' => 'CITOLÓGICO CÉRVICO-VAGINAL', 'descripcion' => 'El estudio citológico del frotis realizado de la muestra cérvico-vaginal, teñido con la técnica de Papanicolaou presenta lo siguiente (Sistema Bethesda modificado).'],
            ['nombre' => 'HEMATOLÓGICO COMPLETO', 'descripcion' => 'El análisis hematológico realizado a partir de una muestra de sangre completa, teñido con técnicas adecuadas para la diferenciación celular y evaluación de componentes sanguíneos.'],
            ['nombre' => 'MICROSCÓPICO Y QUÍMICO DE ORINA', 'descripcion' => 'El análisis de la muestra de orina, realizada con técnicas estandarizadas para la evaluación química y microscópica.'],
            ['nombre' => 'CITOLÓGICO DE ESPUTO', 'descripcion' => 'El análisis citológico del esputo, obtenido mediante expectoración controlada y procesado con técnicas de tinción adecuadas.'],
            ['nombre' => 'CITOLÓGICO BUCCAL', 'descripcion' => 'El análisis citológico de la muestra obtenida de células bucales, procesada con las técnicas adecuadas de tinción.'],
        ];
        

        foreach ($tiposEstudio as $tipo) {
            TipoEstudio::create($tipo);
        }

    }
}
