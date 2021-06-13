<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/estudiantes/index', [\App\Http\Controllers\EstudiantesController::class, 'registerEstudiantes'])->name('estudiantes.index');
Route::post('/estudiantes/registrar', [\App\Http\Controllers\EstudiantesController::class, 'saveEstudiante'])->name('estudiantes.registrarEstudiante');
