<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PromocionInterface;
use App\Interfaces\ZonaInterface;
use App\Repositories\PromocionRepository;
use App\Repositories\ZonaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PromocionInterface::class, PromocionRepository::class);
        $this->app->bind(ZonaInterface::class, ZonaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}