<?php

use App\Http\Controllers\DatingsController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('enviar', [LoginController::class, 'sendMail']);
Route::post('identification', [LoginController::class, 'sendIdentification'])->name('api.sendIdentification');
Route::post('code', [LoginController::class, 'sendCode'])->name('api.sendCode');

//Route::apiResource('agenda',  DatingsController::class, ['store']);