<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ArtistaInterface;
use App\Repositories\ArtistaRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        $this->app->bind(ArtistaInterface::class, ArtistaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
