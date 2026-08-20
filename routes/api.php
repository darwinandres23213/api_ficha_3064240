<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;

Route::apiResource('artista', ArtistaController::class);