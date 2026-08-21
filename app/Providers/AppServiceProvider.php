<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\InventarioInterface;
use App\Repositories\InventarioRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            InventarioInterface::class,
            InventarioRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
