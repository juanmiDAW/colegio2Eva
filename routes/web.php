<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\NotaController;
use App\Models\Asignatura;
use App\Models\Nota;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::resource('alumnos', AlumnoController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('notas', NotaController::class);

Route::get('/finales/index', function (){
    $notas = Nota::with('asignatura')->get();
  return view('notas.finales', ['notas'=> $notas]);  
})->name('notas.finales');