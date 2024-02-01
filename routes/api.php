<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryTSUController;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\OpcionesTSUController;
use App\Http\Controllers\preguntasController;
use App\Http\Controllers\PreguntasTSUController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//rutas preparatorias
Route::apiResource('preguntas', preguntasController::class);
Route::apiResource('categorias', CategoryController::class);
Route::apiResource('opciones', OpcionesController::class);
Route::get('preguntasWithOptions', [preguntasController::class, 'getQuestionsWithOptions']);
//rutas para TSU
Route::apiResource('preguntasTSU', PreguntasTSUController::class);
Route::apiResource('categoriasTSU', CategoryTSUController::class);
Route::apiResource('opcionesTSU', OpcionesTSUController::class);

