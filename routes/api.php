<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ArtistaController;

Route::apiResource('mesas', MesaController::class);
Route::apiResource('artista', ArtistaController::class);
Route::apiResource('ventas', VentaController::class);
Route::patch('ventas/{venta}/anular', [VentaController::class, 'anular']);