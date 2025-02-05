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
        Calidad::factory()->create([
            'nombre' => 'nombre2',
            'idTipoEstudio' => 1,
        ]);
    }
}
