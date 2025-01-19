<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Pengguna\CascadingController;
use App\Http\Controllers\Pengguna\DashboardPenggunaController;
use App\Http\Controllers\Pengguna\Iku\DeleteIkuController;
use App\Http\Controllers\Pengguna\Iku\IkuPreviewController;
use App\Http\Controllers\Pengguna\Iku\IndikatorKinerjaController;
use App\Http\Controllers\Pengguna\Iku\UpdateIkuController;
use App\Http\Controllers\Pengguna\PohonKinerja\PohonKinerjaController;
use App\Http\Controllers\Pengguna\Renstra\DeleteRenstraController;
use App\Http\Controllers\Pengguna\Renstra\EditPreviewController;
use App\Http\Controllers\Pengguna\Renstra\PreviewRenstraController;
use App\Http\Controllers\Pengguna\UploadPerjanjianKinerja;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Walikota\DashboardWalikotaController;
use App\Http\Controllers\Walikota\PerjanjianKinerjaController;
use App\Http\Controllers\Walikota\RealisasiKinerjaController;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [LoginController::class, 'index'])->middleware('redirectIfAuthenticated');

// Route::get('/', [CheckController::class, 'index']);

// Route::get('/cetak', function () {
//     return view('pengguna.cetaksurat.index');
// });


// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });

Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::resource('/akun', \App\Http\Controllers\Admin\CreateUserAccountController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified', 'role:walikota')->group(function () {
    Route::get('beranda-walikota', [DashboardWalikotaController::class, 'index'])->name('dashboard-walikota');
    Route::resource('data-skpd', \App\Http\Controllers\Walikota\DataSkpdController::class);
    Route::resource('/detail-skpd', \App\Http\Controllers\Walikota\DataSkpdController::class);
    Route::patch('detail-program/{id}', [RealisasiKinerjaController::class, 'show'])->name('detail-program');
    Route::patch('/detail-kinerja/{id}', [PerjanjianKinerjaController::class, 'show'])->name('detail-kinerja');
});

Route::middleware('auth', 'verified', 'role:pengguna')->group(function () {

    Route::get('/beranda', [DashboardPenggunaController::class, 'index'])->name('beranda');
    Route::get('/cascading', [CascadingController::class, 'index'])->name('cascading.index');
    Route::get('/pohon', [PohonKinerjaController::class, 'index'])->name('pohon.index');
    Route::post('/upload-kinerja', [UploadPerjanjianKinerja::class, 'store'])->name('upload.kinerja');
    Route::delete('/delete-kinerja/{id}', [UploadPerjanjianKinerja::class, 'delete'])->name('delete-kinerja');
    Route::resource('/cascading-data', \App\Http\Controllers\FinalCascading\Cascading\CascadingController::class);
    Route::resource('/realisasi-program', \App\Http\Controllers\Pengguna\RealisasiProgram\RealisasiProgramController::class);
    Route::resource('/realisasi-rekap', \App\Http\Controllers\Pengguna\RealisasiProgram\RekapRealisasiProgram::class);
    Route::resource('/detail-realisasi', \App\Http\Controllers\Pengguna\RealisasiProgram\DetailRealisasiProgram::class);
    Route::resource('/hapus_cascading', \App\Http\Controllers\Pengguna\Cascading\HapusDataController::class);
    Route::resource('/print', \App\Http\Controllers\Pengguna\CetakSurat\CetakSuratController::class);
    Route::resource('/pegawai', \App\Http\Controllers\Pengguna\DataPegawaiController::class);
    Route::resource('/surat', \App\Http\Controllers\Pengguna\SuratPerjanjian\SuratPerjanjianKinerjaController::class);
    Route::resource('/tujuan', \App\Http\Controllers\Pengguna\Tujuan\TujuanSuratPerjanjianController::class);
    Route::resource('/sasaran', \App\Http\Controllers\Pengguna\SasaranStrategis\SasaranStrategisSuratController::class);
    Route::resource('/indikator', \App\Http\Controllers\Pengguna\IndikatorKinerja\IndikatorKinerjaSurat::class);
    Route::resource('/program', \App\Http\Controllers\Pengguna\ProgramController::class);
    Route::resource('/cascading_detail', \App\Http\Controllers\Pengguna\CascadingDetail\CascadingController::class);
    Route::resource('/tujuan_cascading', \App\Http\Controllers\Pengguna\Cascading\TujuanController::class);
    Route::resource('/sasaran_cascading', \App\Http\Controllers\Pengguna\Cascading\SasaranStrategisController::class);
    Route::resource('/sasaran_program', \App\Http\Controllers\Pengguna\Cascading\SasaranProgramController::class);
    Route::resource('/sasaran_kegiatan', \App\Http\Controllers\Pengguna\Cascading\SasaranKegiatanController::class);
    Route::resource('/realisasi', App\Http\Controllers\Pengguna\Realisasi\RealisasiController::class);
    Route::resource('/realisasi_kegiatan', \App\Http\Controllers\Pengguna\Realisasi\RealisasaiKegiatan::class);
    Route::resource('/rekap-realisasi', App\Http\Controllers\Pengguna\Realisasi\RekapRealisasiKeuanganController::class);
    Route::resource('/rekap-hasil', \App\Http\Controllers\Pengguna\Realisasi\RekapHasilSasaranController::class);
    Route::resource('/sasaran_lima', \App\Http\Controllers\Pengguna\Cascading\SasaranLimaController::class);
    Route::resource('/iku', \App\Http\Controllers\Pengguna\Iku\IkuController::class);
    Route::post('/indikator-iku', [IndikatorKinerjaController::class, 'store'])->name('indikator-iku');
    Route::get('/preview-iku/{id}', [IkuPreviewController::class, 'show'])->name('preview-iku');
    Route::put('/update-iku/{id}', [UpdateIkuController::class, 'update'])->name('update-iku');
    Route::delete('/delete-iku/{id}', [DeleteIkuController::class, 'delete'])->name('delete-iku');
    Route::resource('/renstra', \App\Http\Controllers\Pengguna\Renstra\RenstraController::class);
    Route::resource('/sasaran-renstra', \App\Http\Controllers\Pengguna\Renstra\SasaranRenstra::class);
    Route::resource('/indikator-sasaran', \App\Http\Controllers\Pengguna\Renstra\IndikatorRenstra::class);
    Route::get('/preview-renstra/{id}', [PreviewRenstraController::class, 'show'])->name('preview-renstra');
    Route::put('/preview-update/{id}', [EditPreviewController::class, 'update'])->name('preview-update');
    Route::delete('/renstra-delete/{id}', [DeleteRenstraController::class, 'destroy'])->name('renstra-delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
