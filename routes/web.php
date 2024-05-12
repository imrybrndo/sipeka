<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Pengguna\DashboardPenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::resource('/akun', \App\Http\Controllers\Admin\CreateUserAccountController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified', 'role:pengguna')->group(function(){
    Route::get('/beranda', [DashboardPenggunaController::class, 'index'])->name('beranda');
    Route::resource('/pegawai', \App\Http\Controllers\Pengguna\DataPegawaiController::class);
    Route::resource('/program', \App\Http\Controllers\Pengguna\ProgramController::class);
    Route::resource('/kegiatan', \App\Http\Controllers\Pengguna\KegiatanController::class);
    Route::resource('/indikator', \App\Http\Controllers\Pengguna\IndikatorController::class);

    Route::resource('/kinerja', \App\Http\Controllers\Pengguna\SuratPerjanjianKinerja::class);
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
