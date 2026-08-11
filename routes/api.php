<?php
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('producto',ProductoController::class);