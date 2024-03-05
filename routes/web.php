<?php

use App\Http\Controllers\DatingsController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewLoginController;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [homeController::class, 'index'])->name('home.index');


Route::get('/login', function(){
    if(Auth::check()){
        return redirect(route('home.index'));
    }else{
        return view('begins/index');
    }
})->name('viewLog.index');

Route::get('/inmuebles', [PropertyController::class, 'index'])->name('property.index');
Route::post('inmuebles', [PropertyController::class, 'store'])->name('property.store'); 
Route::get('/inmuebles/{property}/editar', [PropertyController::class, 'edit'])->name('property.edit');
Route::get('/inmuebles/{property}', [PropertyController::class, 'show'])->name('property.show');
Route::put('/inmuebles/{property}', [PropertyController::class, 'update'])->name('property.update');
Route::delete('/inmuebles/{property}', [PropertyController::class, 'destroy'])->name('property.destroy');

Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
Route::get('/usuario/{id}/editar', [UserController::class, 'edit'])->name('user.edit');
Route::get('/usuario/{user}', [UserController::class, 'show'])->name('user.show');
Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/agenda/registrar', [DatingsController::class, 'create'])->name('dating.create');
Route::post('/agenda', [DatingsController::class, 'store'])->name('dating.store');
