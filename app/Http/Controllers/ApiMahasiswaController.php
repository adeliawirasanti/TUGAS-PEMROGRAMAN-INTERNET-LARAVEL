<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ApiMahasiswaController extends Controller
{
    // GET /api/mahasiswa → ambil semua data
    public function index()
    {
        return response()->json(Mahasiswa::all(), 200);
    }

    // GET /api/mahasiswa/{id} → ambil data 1 mahasiswa
    public function show($id)
    {
        $mhs = Mahasiswa::find($id);

        if (!$mhs) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        return response()->json($mhs, 200);
    }

    // POST /api/mahasiswa → tambah data mahasiswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $mhs = Mahasiswa::create($validated);

        return response()->json([
            'message' => 'Mahasiswa berhasil ditambahkan',
            'data' => $mhs
        ], 201);
    }

    // PUT /api/mahasiswa/{id} → update data mahasiswa
    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);

        if (!$mhs) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        $mhs->update($request->all());

        return response()->json([
            'message' => 'Mahasiswa berhasil diperbarui',
            'data' => $mhs
        ], 200);
    }

    // DELETE /api/mahasiswa/{id} → hapus data mahasiswa
    public function destroy($id)
    {
        $mhs = Mahasiswa::find($id);

        if (!$mhs) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        $mhs->delete();

        return response()->json(['message' => 'Mahasiswa berhasil dihapus'], 200);
    }
}
