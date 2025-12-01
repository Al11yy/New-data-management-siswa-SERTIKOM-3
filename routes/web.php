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


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| GURU + ADMIN (SEMUA HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // PROFILE (guru & admin boleh)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| GURU ONLY (ROLE = guru)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:guru'])->group(function () {

    // GURU Hanya boleh lihat siswa
    Route::resource('siswa', SiswaController::class)
        ->only(['index', 'show']);

});


/*
|--------------------------------------------------------------------------
| ADMIN ONLY (ROLE = admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Tahun Ajar
    Route::resource('tahun_ajar', TahunAjarController::class);

    // Jurusan
    Route::resource('jurusan', JurusanController::class);

    // Kelas
    Route::resource('kelas', KelasController::class);

    // Semua fitur siswa untuk admin
    Route::resource('siswa', SiswaController::class)
        ->except(['index', 'show']); // biar route guru tidak bentrok

    // Kelas Detail
    Route::resource('kelas_detail', KelasDetailController::class);

    Route::post('/kelas-detail/ganti-kelas/{siswa}', [KelasDetailController::class, 'gantiKelas'])
        ->name('kelas_detail.gantiKelas');

    // User Management
    Route::resource('user_management', UserManagementController::class);
});


/*
|--------------------------------------------------------------------------
| ROUTE AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
