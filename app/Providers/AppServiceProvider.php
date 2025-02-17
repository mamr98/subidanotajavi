<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\Usuario;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        $usuario = Usuario::find(1); 

    // Si el usuario tiene una imagen en la base de datos, úsala; sino, usa la imagen por defecto
        $logo = $usuario && $usuario->imagen ? $usuario->imagen : asset('usuario_defecto.png');

    // Configura la imagen del logo
        Config::set('adminlte.logo_img', $logo);


        Paginator::useBootstrap(); 
    }
}
