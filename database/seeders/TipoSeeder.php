<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombreTipo = [
            'B' => 'Biopsias',
            'BV' => 'Biopsias Veterinarias',
            'CB' => 'Cavidad Bucal',
            'CV' => 'Citología Vaginal',
            'EX' => 'Extensión Sanguínea',
            'O' => 'Orinas',
            'E' => 'Esputos',
            'ES' => 'Semen',
            'I' => 'Improntas',
            'F' => 'Frotis',
        ];

        foreach ($nombreTipo as $key => $value) {
            Tipo::factory()->create(['codigo'=>$key,'nombre'=>$value]);
        }
    }
}
