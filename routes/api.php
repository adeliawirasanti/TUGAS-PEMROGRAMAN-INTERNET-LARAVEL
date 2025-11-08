<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiMahasiswaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Semua route API ada di sini. Yang butuh login akan dilindungi oleh Sanctum.
| Pastikan kamu sudah login lewat /api/login untuk dapatkan Bearer Token.
|
*/

// Ambil data user login (pakai token)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// AUTH API ROUTES (tanpa token)
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

// ROUTE YANG BUTUH TOKEN (setelah login)
Route::middleware('auth:sanctum')->group(function () {

    // Logout user
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    // Cek profil user login
    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });

    // CRUD Mahasiswa API (JSON response)
    Route::apiResource('mahasiswa', ApiMahasiswaController::class);
});
