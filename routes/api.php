<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CategoriaProductoController;

Route::apiResource('mesas', MesaController::class);
Route::apiResource('artista', ArtistaController::class);
Route::apiResource('categorias-producto', CategoriaProductoController::class)
    ->parameters(['categorias-producto' => 'id']);