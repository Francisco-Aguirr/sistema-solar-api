<?php

use App\Http\Controllers\PlanetaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('planetas', PlanetaController::class);