<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProgramStudiController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;

// Jika belum login, arahkan ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard (menampilkan daftar mahasiswa, hanya bisa diakses setelah login & verifikasi)
Route::get('/dashboard', function () {
    $mahasiswas = Mahasiswa::with(['fakultas', 'programStudi'])->get();
    return view('dashboard', compact('mahasiswas'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route di bawah ini hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    // Profil bawaan Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Mahasiswa, Fakultas, dan Program Studi
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('fakultas', FakultasController::class);
    Route::resource('programstudi', ProgramStudiController::class);
});

// Memastikan auth.php tetap dipanggil agar fitur login & register aktif
require __DIR__.'/auth.php';
