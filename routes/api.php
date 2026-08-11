<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controller\EmpleadosController;

Route::apiResource('Empleados',EmpleadosController::class);