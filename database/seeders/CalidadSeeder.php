<?php

namespace Database\Seeders;

use App\Models\Calidad;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calidades = [
            ['nombre' => 'C1', 'descripcion' => 'Toma válida para examen.', 'idTipoEstudio' => '1'],
            ['nombre' => 'C2', 'descripcion' => 'Toma válida para examen aunque limitada por ausencia de células endocervicales / zona de transición.', 'idTipoEstudio' => '1'],
            ['nombre' => 'C3', 'descripcion' => 'Toma válida para examen aunque limitada por hemorragia.', 'idTipoEstudio' => '1'],
            ['nombre' => 'C4', 'descripcion' => 'Toma válida para examen aunque limitada por escasez de células.', 'idTipoEstudio' => '1'],
            ['nombre' => 'C5', 'descripcion' => 'Toma válida para examen aunque limitada por intensa citolisis.', 'idTipoEstudio' => '1'],
            ['nombre' => 'C6', 'descripcion' => 'Toma válida para examen aunque limitada por...', 'idTipoEstudio' => '1'],
            ['nombre' => 'C7', 'descripcion' => 'Toma no valorable por desecación.', 'idTipoEstudio' => '1'],
            ['nombre' => 'C8', 'descripcion' => 'Toma no valorable por ausencia de células...', 'idTipoEstudio' => '1'],
            ['nombre' => 'C9', 'descripcion' => 'Toma no valorable por...', 'idTipoEstudio' => '1'],
            ['nombre' => 'H1', 'descripcion' => 'Muestra válida para examen.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H2', 'descripcion' => 'Muestra válida para examen aunque limitada por lipemia.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H3', 'descripcion' => 'Muestra válida para examen aunque limitada por hemólisis.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H4', 'descripcion' => 'Muestra válida para examen aunque limitada por aglutinación.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H5', 'descripcion' => 'Muestra válida para examen aunque limitada por coagulación.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H6', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'idTipoEstudio' => '2'],
            ['nombre' => 'H7', 'descripcion' => 'Muestra no valorable por desnaturalización de proteínas.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H8', 'descripcion' => 'Muestra no valorable por contaminación bacteriana.', 'idTipoEstudio' => '2'],
            ['nombre' => 'H9', 'descripcion' => 'Muestra no valorable por...', 'idTipoEstudio' => '2'],
            ['nombre' => 'U1', 'descripcion' => 'Muestra válida para examen.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U2', 'descripcion' => 'Muestra válida para examen aunque limitada por turbidez.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U3', 'descripcion' => 'Muestra válida para examen aunque limitada por coloración anormal.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U4', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación fecal.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U5', 'descripcion' => 'Muestra válida para examen aunque limitada por preservación inadecuada.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U6', 'descripcion' => 'Muestra válida para examen aunque limitada por volumen insuficiente.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U7', 'descripcion' => 'Muestra no valorable por deterioro.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U8', 'descripcion' => 'Muestra no valorable por contaminación con agentes externos.', 'idTipoEstudio' => '3'],
            ['nombre' => 'U9', 'descripcion' => 'Muestra no valorable por...', 'idTipoEstudio' => '3'],
            ['nombre' => 'E1', 'descripcion' => 'Muestra válida para examen.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E2', 'descripcion' => 'Muestra válida para examen aunque limitada por volumen insuficiente.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E3', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E4', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con saliva.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E5', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con secreciones nasales.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E6', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de alimentos.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E7', 'descripcion' => 'Muestra no valorable por descomposición.', 'idTipoEstudio' => '4'],
            ['nombre' => 'E8', 'descripcion' => 'Muestra no valorable por...', 'idTipoEstudio' => '4'],
            ['nombre' => 'E9', 'descripcion' => 'Muestra no valorable por...', 'idTipoEstudio' => '4'],
            ['nombre' => 'B1', 'descripcion' => 'Muestra válida para examen.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B2', 'descripcion' => 'Muestra válida para examen aunque limitada por cantidad insuficiente de células.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B3', 'descripcion' => 'Muestra válida para examen aunque limitada por presencia de sangre.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B4', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con alimentos.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B5', 'descripcion' => 'Muestra válida para examen aunque limitada por contaminación con saliva.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B6', 'descripcion' => 'Muestra válida para examen aunque limitada por...', 'idTipoEstudio' => '5'],
            ['nombre' => 'B7', 'descripcion' => 'Muestra no valorable por deshidratación.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B8', 'descripcion' => 'Muestra no valorable por contaminación con microorganismos.', 'idTipoEstudio' => '5'],
            ['nombre' => 'B9', 'descripcion' => 'Muestra no valorable por...', 'idTipoEstudio' => '5'],
        ];
        

        foreach ($calidades as $calidad) {
            Calidad::create($calidad);
        }
    }
}
