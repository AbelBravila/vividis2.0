<?php

use App\Http\Controllers\AgendarController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\TrabajosController;
use Illuminate\Support\Facades\Route;

Route::get('/vistaAdmin', function () {
    return view('AdminPage.VistaAdmin');
})->name('vistaAdmin');

Route::get('/LandingPage', function () {
    return view('LandingPage.index');
})->name('LandingPage');

Route::get('/', function () {
    return view('welcome');
})->name('/');

//Rutas Generales
Route::get('/inicio', function () {
    return view('welcome');
})->name('inicio');
Route::resource('Clientes', ClienteController::class)->only([
    'store'
]);
//Login
Route::post('/sesion', [LoginController::class, 'login'])->name('sesion');
Route::get('/CerrarSesion', [LoginController::class, 'logout'])->name('CerrarSesion');
Route::get('/IniciaSesion', [LoginController::class, 'MandarLogin'])->name('IniciaSesion');
Route::get('/Registrarse', [LoginController::class, 'Registrarse'])->name('Registrarse');

//Rutas Cliente
Route::resource('Agendar', AgendarController::class)->middleware(['auth', 'Cliente']);
Route::get('/PersonalDisponible{id}', [AgendarController::class, 'buscar'])->name('PersonalDisponible')->middleware(['auth', 'Cliente']);
Route::get('/AgendarCita/{id}/{idTrabajo}', [AgendarController::class, 'Agendar'])->name('AgendarCita')->middleware(['auth', 'Cliente']);
Route::resource('Citas', CitasController::class)->only([
    'index', 'destroy'
])->middleware(['auth', 'Cliente']);
Route::get('/FechasDisponibles{id}', [AgendarController::class, 'fechasDisponible'])->name('FechasDisponibles');

//Rutas Empleado
Route::get('/CitasEmpleado', [PersonalController::class, 'indexEmpleado'])->name('CitasEmpleado')->middleware(['auth', 'Empleado']);
Route::put('/ConfirmarCita{id}', [PersonalController::class, 'ConfirmarCita'])->name('ConfirmarCita')->middleware(['auth', 'Empleado']);

//Rutas Administrador
Route::resource('Trabajos', TrabajosController::class)->middleware(['auth', 'Administrador']);
Route::get('/TrabajosS', [TrabajosController::class, 'buscar'])->name('TrabajosS')->middleware(['auth', 'Administrador']);
Route::resource('Horarios', HorarioController::class)->middleware(['auth', 'Administrador']);
Route::get('/HorariosS', [HorarioController::class, 'buscar'])->name('HorariosS')->middleware(['auth', 'Administrador']);
Route::resource('Personal', PersonalController::class)->middleware(['auth', 'Administrador']);
Route::get('/PersonalS', [PersonalController::class, 'buscar'])->name('PersonalS')->middleware(['auth', 'Administrador']);
Route::resource('Especialidades', EspecialidadesController::class)->middleware(['auth', 'Administrador']);
Route::get('/EspecialidadesS', [EspecialidadesController::class, 'buscar'])->name('EspecialidadesS')->middleware(['auth', 'Administrador']);
Route::resource('Clientes', ClienteController::class)->only([
    'index', 'destroy', 'update'
])->middleware(['auth', 'Administrador']);
Route::get('/CitasGeneral', [CitasController::class, 'indexGeneral'])->name('Citas.IndexGeneral')->middleware(['auth', 'Administrador']);
Route::resource('Citas', CitasController::class)->only([
    'update'
])->middleware(['auth', 'Administrador']);
Route::get('/CitasS', [CitasController::class, 'buscar'])->name('CitasS')->middleware(['auth', 'Administrador']);
Route::get('/ClientesS', [ClienteController::class, 'buscar'])->name('ClientesS')->middleware(['auth', 'Administrador']);

//Usuarios Administrador
Route::get('/usuarios', [LoginController::class, 'index'])->name('usuarios')->middleware(['auth', 'Administrador']);
Route::post('/Crear-usuario', [LoginController::class, 'registrar'])->name('Crear-usuario')->middleware(['auth', 'Administrador']);
Route::delete('/EliminarUsuario/{id}', [LoginController::class, 'destroy'])->name('EliminarUsuario')->middleware(['auth', 'Administrador']);
Route::put('/ActualizarUsuario{id}', [LoginController::class, 'update'])->name('ActualizarUsuario')->middleware(['auth', 'Administrador']);

Route::get('/RegistrarPrueba', [LoginController::class, 'registrarPrueba']);
