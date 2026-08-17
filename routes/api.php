<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::apiResource('cliente',ClienteController::class);
