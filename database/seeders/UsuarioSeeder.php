<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::factory()->create([
            'email' => 'miguel@miguel.com',
            'password' => '123',
            'rol' => 'usuario',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'marcos@marcos.com',
            'password' => '123',
            'rol' => 'usuario',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'pablo@pablo.com',
            'password' => '123',
            'rol' => 'usuario',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'david@david.com',
            'password' => '123',
            'rol' => 'usuario',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'milena@milena.com',
            'password' => '123',
            'rol' => 'administrador',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'garcia@garcia.com',
            'password' => '123',
            'rol' => 'administrador',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'pelaez@pelaez.com',
            'password' => '123',
            'rol' => 'administrador',
            'estado' => true,
            'idSede' => 1,
        ]);
        Usuario::factory()->create([
            'email' => 'gallego@gallego.com',
            'password' => '123',
            'rol' => 'administrador',
            'estado' => true,
            'idSede' => 1,
        ]);
    }
}
