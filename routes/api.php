<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ZonaController;

Route::apiResource('promocion', PromocionController::class);

Route::apiResource('usuario', UsuarioController::class);

Route::apiResource('zona', ZonaController::class);
