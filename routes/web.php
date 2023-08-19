<?php

use Illuminate\Support\Facades\Route;
use App\Models\TipoMaquina;
use App\Http\Controllers\CaracteristicaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AlquilerController;
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
//URL::forceScheme('https');

Route::get('/', function () {
    return view('pages.inicio');
})->name('inicio');

Route::get('/nosotros', function(){
    return view('pages.nosotros');
})->name('nosotros');

//El Salvador
Route::get('/alquiler/elsalvador',[AlquilerController::class, 'alquilerSV'])->name('alquiler-sv');
Route::get('/alquiler/elsalvador/categoria/{id}',[AlquilerController::class, 'alquilerSVCategoria'])->name('alquiler-sv-categoria');
//Guatemala
Route::get('/alquiler/guatemala',[AlquilerController::class, 'alquilerGt'])->name('alquiler-gt');
Route::get('/alquiler/guatemala/categoria/{id}',[AlquilerController::class, 'alquilerGtCategoria'])->name('alquiler-gt-categoria');

Route::get('/alquiler/maquina/{id}', [AlquilerController::class, 'maquina'])->name('maquina');

Route::get('/contacto', function(){
    return view('pages.contacto');
})->name('contacto');

//Autenticación 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('/pais', App\Http\Controllers\PaiController::class)->middleware('auth');
Route::resource('/tipo-maquinas', App\Http\Controllers\TipoMaquinaController::class)->middleware('auth');
Route::resource('/maquinas', App\Http\Controllers\MaquinaController::class)->middleware('auth');
// ... otras rutas que desees mantener ...

// Ruta de inicio de sesión
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Ruta de cierre de sesión
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Rutas de restablecimiento de contraseña
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

//Fin autenticación

//Maquinaria
Route::post('/caracteristicas', [CaracteristicaController::class, 'store'])->name('caracteristicas.store');
Route::delete('/caracteristicas/{id}',[CaracteristicaController::class, 'destroy'])->name('caracteristicas.delete');
Route::get('/maquinas/{id}/caracteristicas',[CaracteristicaController::class, 'maquina'])->name('caracteristicas.maquina');
Route::get('/maquinas/{id}/imagenes',[ImagenController::class, 'maquina'])->name('imagen.maquina');
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
Route::delete('/imagenes/{id}',[ImagenController::class, 'destroy'])->name('imagenes.delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
