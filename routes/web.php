<?php

use Illuminate\Support\Facades\Route;

// Controller bawaan auth
use App\Http\Controllers\ProfileController;

// Controller data master
use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;

// ==========================================
// ROUTE HALAMAN UTAMA (PUBLIC)
// ==========================================
Route::get('/', function () {
    return redirect()->route('login');
});

    // ==========================================
    // ROUTE DASHBOARD (HARUS LOGIN)
    // ==========================================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');


    // ==========================================
    // ROUTE YANG HANYA BISA DIAKSES SETELAH LOGIN
    // ==========================================
    Route::middleware('auth')->group(function () {

    // ===============================
    // PROFILE
    // ===============================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ===============================
    // RESOURCE CRUD
    // ===============================

    // Tahun Ajar
    Route::resource('tahun_ajar', TahunAjarController::class);

    // Jurusan
    Route::resource('jurusan', JurusanController::class);

    // Kelas
    Route::resource('kelas', KelasController::class);

    // Siswa
    Route::resource('siswa', SiswaController::class);

    // route resource yang sudah ada
    Route::resource('kelas_detail', KelasDetailController::class);

    // route untuk ganti kelas (dipanggil dari detail.blade)
    Route::post('/kelas-detail/ganti-kelas/{siswa}', [KelasDetailController::class, 'gantiKelas'])
        ->name('kelas_detail.gantiKelas');

    Route::resource('user_management', UserManagementController::class);




});

// ==========================================
// ROUTE AUTH (LOGIN, REGISTER, DLL)
// ==========================================
require __DIR__.'/auth.php';
