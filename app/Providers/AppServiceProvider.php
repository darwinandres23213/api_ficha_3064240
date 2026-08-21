<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\DetalleVentaInterface;
use App\Repositories\DetalleVentaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            DetalleVentaInterface::class,
            DetalleVentaRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
