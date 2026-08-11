<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controller\EventoController;

Route::apiResource("evento", EventoController::class);