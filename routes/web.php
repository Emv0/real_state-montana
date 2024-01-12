<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [homeController::class, 'index']);

Route::get('/inmuebles',[PropertyController::class, 'index'])->name('state.index');
Route::get('/inmuebles/registrar',[PropertyController::class, 'create'])->name('property.create');
Route::get('/inmuebles/{inmueble}',[PropertyController::class, 'show'])->name('property.show');

Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
Route::get('/usuario/{usuario}',[UserController::class, 'show'])->name('user.show');