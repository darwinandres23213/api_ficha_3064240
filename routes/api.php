<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\RolController;

Route::apiResource('rol',RolController::class);