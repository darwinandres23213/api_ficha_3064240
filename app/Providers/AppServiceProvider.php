<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ZonaRepository;
use App\Interfaces\ZonaInterface;
use App\Repositories\ProductoRepository;
use App\Interfaces\ProductoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(ZonaInterface::class, ZonaRepository::class);

        $this->app->bind(ProductoInterface::class,ProductoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
