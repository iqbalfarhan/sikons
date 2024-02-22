<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/laporan/mine', [LaporanController::class, 'mine']);

    Route::resource('laporan', LaporanController::class);
});

Route::post('/laporan/generate', [LaporanController::class, 'generate']);

Route::post('/login',  [AuthController::class,'login']);

