<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Promocioncontroller;

Route::apiResource('promocion', Promocioncontroller::class);
