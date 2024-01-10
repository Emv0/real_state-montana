<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\StateController;
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

Route::get('/inmuebles',[StateController::class,'index'])->name('state.index');

Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
Route::get('/usuarios/registrar', [UserController::class, 'create'])->name('user.create');
Route::get('/usuario/{usuario}',[UserController::class, 'show'])->name('user.show');