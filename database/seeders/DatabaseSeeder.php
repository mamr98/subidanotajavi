<?php

namespace Database\Seeders;

use App\Models\TipoEstudio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            TipoSeeder::class,
            MuestraSeeder::class,
            SedeSeeder::class,
            UsuarioSeeder::class,
            FormatoSeeder::class,
            TipoEstudioSeeder::class,
            CalidadSeeder::class,
        ]);

        User::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
