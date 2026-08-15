<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::apiResource('evento', EventoController::class);