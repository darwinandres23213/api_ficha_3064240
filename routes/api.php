<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\ClienteController;

Route::apiResource('cliente',ClienteController::class);
