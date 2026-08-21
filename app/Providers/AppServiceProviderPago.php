<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PagoInterface;
use App\Repositories\PagoRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PagoInterface::class,
            PagoRepository::class
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