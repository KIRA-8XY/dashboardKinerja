<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});

// (Opsional) Route dashboard umum, bisa dihapus kalau tidak dipakai
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Route profile (boleh tetap ada)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ⬇️ Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Tambahkan route admin lainnya di sini
});

// ⬇️ Route untuk pegawai
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/pegawai/dashboard', [PegawaiController::class, 'index'])->name('pegawai.dashboard');
});

Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/pegawai/kinerja', [PegawaiController::class, 'kinerjaPerBulan'])->name('pegawai.kinerja');
});


// Route auth default dari Laravel Breeze
require __DIR__.'/auth.php';
