<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Pengguna\CascadingController;
use App\Http\Controllers\Pengguna\DashboardPenggunaController;
use App\Http\Controllers\Pengguna\PohonKinerja\PohonKinerjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/cetak', function(){
    return view('pengguna.cetaksurat.index');
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

Route::middleware('auth', 'verified', 'role:pengguna')->group(function () {
    Route::get('/beranda', [DashboardPenggunaController::class, 'index'])->name('beranda');
    Route::get('/cascading', [CascadingController::class, 'index'])->name('cascading.index');
    Route::get('/pohon', [PohonKinerjaController::class, 'index'])->name('pohon.index'); 

    Route::resource('/print', \App\Http\Controllers\Pengguna\CetakSurat\CetakSuratController::class);
    Route::resource('/pegawai', \App\Http\Controllers\Pengguna\DataPegawaiController::class);
    Route::resource('/surat', \App\Http\Controllers\Pengguna\SuratPerjanjian\SuratPerjanjianKinerjaController::class);
    Route::resource('/tujuan', \App\Http\Controllers\Pengguna\Tujuan\TujuanSuratPerjanjianController::class);
    Route::resource('/sasaran', \App\Http\Controllers\Pengguna\SasaranStrategis\SasaranStrategisSuratController::class);
    Route::resource('/indikator', \App\Http\Controllers\Pengguna\IndikatorKinerja\IndikatorKinerjaSurat::class);
    Route::resource('/program', \App\Http\Controllers\Pengguna\ProgramController::class);
    Route::resource('/realisasi', \App\Http\Controllers\Pengguna\RealisasiAnggaran\RealisasiAnggaranController::class);

    Route::resource('/tujuan_cascading', \App\Http\Controllers\Pengguna\Cascading\TujuanController::class);
    Route::resource('/sasaran_cascading', \App\Http\Controllers\Pengguna\Cascading\SasaranStrategisController::class);
    Route::resource('/sasaran_program', \App\Http\Controllers\Pengguna\Cascading\SasaranProgramController::class);
    Route::resource('/sasaran_kegiatan', \App\Http\Controllers\Pengguna\Cascading\SasaranKegiatanController::class);
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
