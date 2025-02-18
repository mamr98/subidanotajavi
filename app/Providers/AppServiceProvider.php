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
    try {
        $usuario = Usuario::find(1); 
        $logo = $usuario && $usuario->imagen ? $usuario->imagen : asset('usuario_defecto.png');
        Config::set('adminlte.logo_img', $logo);
    } catch (\Exception $e) {
        // Si hay un error, usa la imagen por defecto
        Config::set('adminlte.logo_img', asset('usuario_defecto.png'));
    }

    Paginator::useBootstrap(); 
}
}
