<?php

use App\Http\Controllers\AgendarController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\TrabajosController;
use Illuminate\Support\Facades\Route;

Route::get('/inicio', function () {
    return view('welcome');
})->name('inicio');

Route::get('/vistaAdmin', function () {
    return view('AdminPage.VistaAdmin');
})->name('vistaAdmin');

Route::get('/LandingPage', function () {
    return view('LandingPage.index');
})->name('LandingPage');

Route::get('/', function () {
    return view('welcome');
})->name('/');

//Route::get("/personal",[VistasController::class,"personalpage"])->name("personal");
//Route::post("/Crear-Personal",[PersonalCRUDCONTROLLER::class,"registrar"])->name("Crear-Personal")->middleware("auth");

// Route::get('/inicio', function () {
//     return view('dashboard');
// })->name('inicio')->middleware('auth');
//Route::get('Personalitis', PersonalController::class,"index")->middleware('auth');

Route::resource('Agendar', AgendarController::class)->middleware('auth');
Route::resource('Trabajos', TrabajosController::class)->middleware('auth');
Route::resource('Horarios', HorarioController::class)->middleware('auth');
Route::resource('Personal', PersonalController::class)->middleware('auth');
Route::resource('Especialidades', EspecialidadesController::class)->middleware('auth');

Route::resource('Clientes', ClienteController::class)->only([
    'index', 'destroy', 'update'
])->middleware(['auth', 'Administrador']);

Route::get('/Registrarse', [LoginController::class, 'Registrarse'])->name('Registrarse');

Route::resource('Clientes', ClienteController::class)->only([
    'store'
]);


Route::get('/CitasGeneral', [CitasController::class, 'indexGeneral'])->name('Citas.IndexGeneral')->middleware(['auth', 'Administrador']);
// Route::resource('Citas', CitasController::class)->middleware('auth');

Route::resource('Citas', CitasController::class)->only([
         'index', 'destroy'
     ])->middleware('auth');

     Route::resource('Citas', CitasController::class)->only([
        'update'
    ])->middleware(['auth', 'Administrador']);

Route::get('/CitasS', [CitasController::class, 'buscar'])->name('CitasS')->middleware('auth');
Route::get('/ClientesS', [ClienteController::class, 'buscar'])->name('ClientesS')->middleware('auth');

Route::get('/EspecialidadesS', [EspecialidadesController::class, 'buscar'])->name('EspecialidadesS')->middleware('auth');
Route::get('/HorariosS', [HorarioController::class, 'buscar'])->name('HorariosS')->middleware('auth');
Route::get('/TrabajosS', [TrabajosController::class, 'buscar'])->name('TrabajosS')->middleware('auth');
Route::get('/PersonalS', [PersonalController::class, 'buscar'])->name('PersonalS')->middleware('auth');
Route::get('/PersonalDisponible{id}', [AgendarController::class, 'buscar'])->name('PersonalDisponible');
Route::get('/AgendarCita/{id}/{idTrabajo}', [AgendarController::class, 'Agendar'])->name('AgendarCita');
Route::get('/FechasDisponibles{id}', [AgendarController::class, 'fechasDisponible'])->name('FechasDisponibles');

Route::post('/sesion', [LoginController::class, 'login'])->name('sesion');
Route::get('/CerrarSesion', [LoginController::class, 'logout'])->name('CerrarSesion');
Route::get('/IniciaSesion', [LoginController::class, 'MandarLogin'])->name('IniciaSesion');


Route::get('/usuarios', [LoginController::class, 'index'])->name('usuarios')->middleware(['auth', 'Administrador']);
Route::post('/Crear-usuario', [LoginController::class, 'registrar'])->name('Crear-usuario')->middleware('auth');
Route::delete('/EliminarUsuario/{id}', [LoginController::class, 'destroy'])->name('EliminarUsuario')->middleware('auth');
Route::put('/ActualizarUsuario{id}', [LoginController::class, 'update'])->name('ActualizarUsuario')->middleware('auth');

// Route::resource('Contactanos', ContactanosController::class)->only([
//     'store'
// ]);

// Route::resource('Contactanos', ContactanosController::class)->only([
//     'index', 'update', 'destroy'
// ])->middleware('auth');

// Route::resource('Servicios', ServicioController::class)->middleware('auth');
// Route::resource('Resultados', ResultadosController::class)->middleware('auth');

Route::get('/RegistrarPrueba', [LoginController::class, 'registrarPrueba']);
// Route::get('/RegistrarPrueba', [LoginController::class, 'registrarPrueba'])->middleware(['auth', 'Administrador']);