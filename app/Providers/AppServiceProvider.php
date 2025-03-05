<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    Paginator::useBootstrap();
    View::composer('*', function ($view) {
        $usuario = Auth::user();
        $logo = !empty($usuario?->foto) ? asset($usuario->foto) : asset('usuario_defecto.png');

        // Configurar el logo dinámico en AdminLTE
        config(['adminlte.logo_img' => $logo]);
    });
}
}
