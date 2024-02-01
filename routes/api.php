<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/generate', function(Request $request){
    $request->validate([
        'tanggal' => 'required'
    ]);

    foreach (Lokasi::pluck('id') as $lokasi_id) {
        foreach (['malam', 'pagi', 'sore'] as $waktu) {
            Laporan::create([
                'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
                'user_id' => Arr::random(User::pluck('id')->toArray()),
                'lokasi_id' => $lokasi_id,
                'waktu' => $waktu
            ]);
        }
    }
});
