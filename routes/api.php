<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;

Route::apiResource('mesas', MesaController::class);