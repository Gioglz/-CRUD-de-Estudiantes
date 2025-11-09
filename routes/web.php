<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [EstudianteController::class, 'index']);


Route::resource('estudiantes', EstudianteController::class);
Route::resource('carreras', CarreraController::class);