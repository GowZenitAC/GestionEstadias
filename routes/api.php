<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryTSUController;
use App\Http\Controllers\equipoController;
use App\Http\Controllers\EquiposTSUController;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\OpcionesTSUController;
use App\Http\Controllers\preguntasController;
use App\Http\Controllers\PreguntasTSUController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\CarrerasdosController;
use App\Http\Controllers\ResultadosTSUController;
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
Route::get('preguntas', [preguntasController::class, 'index']);
Route::get('apiequipos', [equipoController::class, 'index']);
Route::apiResource('categorias', CategoryController::class);
Route::apiResource('opciones', OpcionesController::class);
Route::get('preguntasWithOptions', [preguntasController::class, 'getQuestionsWithOptions']);
// Route::post('resultados', [ResultadosController::class, 'store']);
Route::apiResource('resultados', ResultadosController::class);
//rutas para TSU
Route::get('preguntasTSU', [PreguntasTSUController::class, 'getQuestionsWithOptions']);
Route::apiResource('categoriasTSU', CategoryTSUController::class);
Route::apiResource('opcionesTSU', OpcionesTSUController::class);
Route::get('equiposTSU', [EquiposTSUController::class, 'index']);
Route::get('carreras', [CarrerasdosController::class, 'index']);
Route::apiResource('resultadosTSU', ResultadosTSUController::class);
