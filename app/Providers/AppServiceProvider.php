<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\Interfaces\PagoInterface;
use app\Repositories\PagoRepository;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        
    $this->app->bind(PagoRepositoryInterface::class, PagoRepository::class);


    }

   
    public function boot(): void
    {
        //
    }
}