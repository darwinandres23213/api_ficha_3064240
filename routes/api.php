<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ArtistaController;

Route::apiResource('mesas', MesaController::class);
Route::apiResource('artista', ArtistaController::class);
Route::apiResource('proveedores', ProveedorController::class);
