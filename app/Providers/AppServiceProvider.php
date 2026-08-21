<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ArtistaInterface;
use App\Repositories\ArtistaRepository;
use App\Interfaces\CategoriaProductoInterface;
use App\Repositories\CategoriaProductoRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ArtistaInterface::class, ArtistaRepository::class);
        $this->app->bind(CategoriaProductoInterface::class, CategoriaProductoRepository::class);
    }

    public function boot(): void
    {
        //
    }
}