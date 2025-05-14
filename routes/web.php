<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PrestamoController;


Route::get('/', function () {
    return view('welcome');
  })->name('welcome');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'dashboard']);
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/', function () {
//     return 'Panel de administración';
//     });
//     Route::get('/users', function () {
//     return 'Lista de usuarios';
//     });
// }); 

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);
    Route::get('/home', [App\Http\controllers\HomeController::class, 'index'])->name('home');

    Route::resource('personas',PersonaController::class);
    Route::resource('prestamos', PrestamoController::class);
    Route::get('cambioEstadoPrestamos',[PrestamoController::class, 'cambioEstadoPrestamos'])->name('cambioEstadoPrestamos');

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

