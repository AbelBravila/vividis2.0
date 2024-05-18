<?php

use App\Http\Controllers\AgendarController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/inicio', function () {
    return view('dashboard');
})->name('inicio')->middleware('auth');

Route::resource('Agendar', AgendarController::class);
Route::get('/PersonalDisponible{id}', [AgendarController::class, 'buscar'])->name('PersonalDisponible');

Route::post('/sesion', [LoginController::class, 'login'])->name('sesion');
Route::get('/CerrarSesion', [LoginController::class, 'logout'])->name('CerrarSesion');
Route::get('/IniciaSesion', [LoginController::class, 'MandarLogin'])->name('IniciaSesion');

// Route::get('/usuarios', [LoginController::class, 'index'])->name('usuarios')->middleware('auth');
// Route::post('/Crear-usuario', [LoginController::class, 'registrar'])->name('Crear-usuario')->middleware('auth');
// Route::delete('/EliminarUsuario/{id}', [LoginController::class, 'destroy'])->name('EliminarUsuario')->middleware('auth');
// Route::put('/ActualizarUsuario{id}', [LoginController::class, 'update'])->name('ActualizarUsuario')->middleware('auth');

// Route::resource('Contactanos', ContactanosController::class)->only([
//     'store'
// ]);

// Route::resource('Contactanos', ContactanosController::class)->only([
//     'index', 'update', 'destroy'
// ])->middleware('auth');

// Route::resource('Clientes', ClienteController::class)->middleware('auth');
// Route::get('/ClientesS', [ClienteController::class, 'buscar'])->name('ClientesS')->middleware('auth');

// Route::get('/ContactanosS', [ContactanosController::class, 'buscar'])->name('ContactanosS')->middleware('auth');
// Route::get('/ServiciosS', [ServicioController::class, 'buscar'])->name('CitasS')->middleware('auth');

// Route::resource('Servicios', ServicioController::class)->middleware('auth');
// Route::resource('Resultados', ResultadosController::class)->middleware('auth');