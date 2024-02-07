<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryTSUController;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\preguntasController;
use App\Http\Controllers\OpcionesTSUController;
use App\Http\Controllers\preguntasTSUController;
use App\Http\Controllers\equipoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->middleware('auth');
Route::get('home', function () {
    return view('layout.app');
});
// apis
Route::resource('apiCategory',CategoryController::class);
Route::Resource('apiPreguntas',preguntasController::class);
Route::resource('apiOpciones',OpcionesController::class);
Route::resource('apiEquipos',equipoController::class);

//apis tsu
Route::resource('apiCategoryTSU',CategoryTSUController::class);
Route::resource('apiOpcionesTSU',OpcionesTSUController::class);
Route::resource('apiPreguntasTSU',preguntasTSUController::class);

//vistas de las ventanas
Route::view('inicio','inicio')->middleware('auth');
Route::view('categorias','categorias')->middleware('auth');
Route::view('preguntas','preguntas')->middleware('auth');
Route::view('opciones','opciones')->middleware('auth');
Route::view('equipos', 'equipos')->middleware('auth');
//vistas tsu
Route::view('categoriasTSU','categoriasTSU')->middleware('auth')->middleware('auth');
Route::view('opcionesTSU','opcionesTSU')->middleware('auth')->middleware('auth');
Route::view('preguntasTSU','preguntasTSU')->middleware('auth')->middleware('auth');

//login
Route::get('/login',[SessionsController::class, 'create'])
->middleware('guest')
->name('login.index');

Route::get('/register',[RegisterController::class, 'create'])
->middleware('guest')
->name('register.index');

Route::post('/register',[RegisterController::class, 'store'])
->name('register.store');

Route::post('/login',[SessionsController::class, 'store'])
->name('login.store');

Route::get('/logout',[SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');
