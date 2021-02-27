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

$homeController = App\Http\Controllers\HomeController::class;
$viajeController = App\Http\Controllers\ViajeController::class;
$depositoController = App\Http\Controllers\DepositoController::class;
$gastoController = App\Http\Controllers\GastoController::class;

Route::get('/', [$homeController, 'index'])->name('home');
Auth::routes();

Route::get('/viaje/create', [$viajeController, 'create'])->name('viaje.create');
Route::get('/viaje/{id}', [$viajeController, 'detail'])->name('viaje.detail');
Route::post('/viaje/save', [$viajeController, 'save'])->name('viaje.save');

Route::get('/deposito/index', [$depositoController, 'index'])->name('deposito.index');
Route::get('/deposito/create', [$depositoController, 'create'])->name('deposito.create');
Route::post('/deposito/save', [$depositoController, 'save'])->name('deposito.save');

Route::post('/gasto/save', [$gastoController, 'save'])->name('gasto.save');