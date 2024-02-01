<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Resources\UserResource;
use App\Models\Laporan;
use App\Models\Lokasi;
use App\Models\User;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/laporan/mine', [LaporanController::class, 'mine']);

    Route::resource('laporan', LaporanController::class);
});

Route::post('login',  [AuthController::class,'login']);


// Route::get('laporan', [LaporanController::class, 'index']);

// Route::post('/generate', function(Request $request){
//     $request->validate([
//         'tanggal' => 'required'
//     ]);

//     foreach (Lokasi::pluck('id') as $lokasi_id) {
//         foreach (['malam', 'pagi', 'sore'] as $waktu) {
//             Laporan::create([
//                 'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
//                 'user_id' => Arr::random(User::pluck('id')->toArray()),
//                 'lokasi_id' => $lokasi_id,
//                 'waktu' => $waktu
//             ]);
//         }
//     }
// });
