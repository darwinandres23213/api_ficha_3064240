<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromocionController;

Route::apiResource('promocion', PromocionController::class);
