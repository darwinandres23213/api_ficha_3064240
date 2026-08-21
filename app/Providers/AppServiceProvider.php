<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ClienteRepository;
use App\Interfaces\ClienteInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClienteInterface::class, ClienteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
