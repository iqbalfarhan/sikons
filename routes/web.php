<?php

use App\Http\Controllers\LaporanController;
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

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');
});

Route::middleware('auth')->group(function(){

    Route::get('/home', App\Livewire\Pages\Dashboard\Home::class)->name('home');
    Route::get('/kwhmeter', App\Livewire\Pages\Dashboard\Kwhmeter::class)->name('kwhmeter');
    Route::get('/simaru', App\Livewire\Pages\Dashboard\Simaru::class)->name('simaru');
    Route::get('/lembur', App\Livewire\Pages\Dashboard\Lembur::class)->name('lembur');

    Route::get('/kwhmeter/{token}', App\Livewire\Pages\Kwhmeter\Show::class)->name('kwhmeter.show');

    Route::get('/lokasi', App\Livewire\Pages\Lokasi\Index::class)->name('lokasi.index');
    Route::get('/lokasi/{lokasi}/edit', App\Livewire\Pages\Lokasi\Edit::class)->name('lokasi.edit');

    Route::get('/role', App\Livewire\Pages\Role\Index::class)->name('role.index');

    Route::get('/user', App\Livewire\Pages\User\Index::class)->name('user.index');
    Route::get('/user/raw', App\Livewire\Pages\User\Raw::class)->name('user.raw');
    Route::get('/profile', App\Livewire\Pages\User\Profile::class)->name('profile');

    Route::get('/laporan', App\Livewire\Pages\Laporan\Index::class)->name('laporan.index');
    Route::get('/laporan/search', App\Livewire\Pages\Laporan\Search::class)->name('laporan.search');
    Route::get('/laporan/summary', App\Livewire\Pages\Laporan\Summary::class)->name('laporan.summary');
    Route::get('/laporan/summary/{periode}/{uniq}', [LaporanController::class, 'summarysnap'])->name('laporan.summarysnap');
    Route::get('/laporan/download', App\Livewire\Pages\Laporan\Download::class)->name('laporan.download');
    Route::get('/laporan/create', App\Livewire\Pages\Laporan\Create::class)->name('laporan.create');
    Route::get('/laporan/listrik', App\Livewire\Pages\Laporan\Listrik::class)->name('laporan.listrik');
    Route::get('/laporan/mine', App\Livewire\Pages\Laporan\Mine::class)->name('laporan.mine');
    Route::get('/laporan/{laporan}', App\Livewire\Pages\Laporan\Show::class)->name('laporan.show');
    Route::get('/laporan/{laporan}/edit', App\Livewire\Pages\Laporan\Edit::class)->name('laporan.edit');

    Route::get('/token/{token}', App\Livewire\Pages\Token\Show::class)->name('token.show');
});
