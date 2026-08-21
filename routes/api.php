<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ZonaController;

Route::apiResource('usuario', UsuarioController::class);


Route::apiResource('zona', ZonaController::class);

Route::apiResource('cliente',ClienteController::class);
