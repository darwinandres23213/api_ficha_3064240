<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagoController;

Route::apiResource('pago',Pagocontroller::class);
