<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controller\UsuarioController;

Route::apiResource('usuario',UsuarioController::class);