<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\MesaController;


Route::apiResource("mesa",MesaController::class);