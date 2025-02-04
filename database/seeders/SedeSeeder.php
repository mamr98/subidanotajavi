<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombreSedes = [
            'Albacete',
            'Alicante',
            'Alicante II',
            'Almeria',
            'Córdoba',
            'Leganés',
            'Granada',
            'Huelva',
            'Jerez',
            'Madrid',
            'Málaga',
            'Murcia',
            'Sevilla',
            'Valencia',
            'Zaragoza',
        ];

        $codigoSedes = [
            'A',
            'Al',
            'ALII',
            'I',
            'C',
            'L',
            'G',
            'H',
            'J',
            'M',
            'MG',
            'MU',
            'S',
            'V',
            'Z',
        ];

        for ($i=0; $i < count($nombreSedes); $i++) { 
            Sede::factory()->create(['codigo'=>$codigoSedes[$i],'nombre'=>$nombreSedes[$i]]);    
        }
    }
}
