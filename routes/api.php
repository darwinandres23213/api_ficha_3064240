<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\RolController;

Route::apiResource('roles', RolController::class);

