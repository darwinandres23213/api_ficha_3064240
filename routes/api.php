
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaProductoController;


Route::apiResource('categoria-producto', CategoriaProductoController::class);