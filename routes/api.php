<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetalleVentaController;

Route::apiResource('detalleventa', DetalleVentaController::class);
