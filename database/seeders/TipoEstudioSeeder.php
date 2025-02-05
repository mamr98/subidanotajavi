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
        TipoEstudio::factory()->create([
            'nombre' => 'nombre',
            'descripcion' => 'descripcion',
        ]);
        TipoEstudio::factory()->create([
            'nombre' => 'nombre2',
            'descripcion' => 'descripcion2',
        ]);
    }
}
