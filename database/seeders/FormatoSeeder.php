<?php

namespace Database\Seeders;

use App\Models\Formato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formato::factory()->create([
            'codigo' => 'fre',
            'nombre' => 'fresco',
        ]);
        Formato::factory()->create([
            'codigo' => 'for',
            'nombre' => 'formol',
        ]);
        Formato::factory()->create([
            'codigo' => 'et',
            'nombre' => 'etanol70',
        ]);
    }
}
