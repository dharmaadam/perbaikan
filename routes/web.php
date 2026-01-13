<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengajuanPerbaikanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

// ========================
// Halaman Utama
// ========================
Route::get('/', function () {
    return redirect()->route('login.form');
});

// ========================
// LOGIN & AUTH
// ========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ========================
// ADMIN AREA
// ========================
Route::middleware(['auth'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    

    // Barang
    Route::resource('barang', BarangController::class);
    Route::get('barang-export', [BarangController::class, 'exportPDF'])->name('barang.export');

    // Pengajuan Perbaikan
    Route::resource('pengajuanperbaikan', PengajuanPerbaikanController::class);
    Route::get('pengajuanperbaikan-export', [PengajuanPerbaikanController::class, 'exportPDF'])->name('pengajuanperbaikan.export');

    // Laporan
    Route::resource('laporan', LaporanController::class);
    Route::get('laporan-export', [LaporanController::class, 'export'])->name('laporan.export');

    // Pemeriksaan Rutin
    Route::resource('pemeriksaanrutin', App\Http\Controllers\PemeriksaanRutinController::class);
    Route::get('pemeriksaanrutin-export', [App\Http\Controllers\PemeriksaanRutinController::class, 'exportPDF'])->name('pemeriksaanrutin.export');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users-export', [App\Http\Controllers\Admin\UserController::class, 'exportPDF'])->name('users.export');
    Route::resource('teknisi', App\Http\Controllers\Admin\TeknisiController::class);
    Route::get('teknisi-export', [App\Http\Controllers\Admin\TeknisiController::class, 'exportPDF'])->name('teknisi.export');
});
