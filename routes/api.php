<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\ProductoController;


Route::apiResource('zona', ZonaController::class);
Route::apiResource('producto', ProductoController::class);
