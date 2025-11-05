<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // ✅ Menampilkan daftar mahasiswa
    public function index(Request $request)
    {
        // Ambil semua fakultas & prodi untuk dropdown filter
        $fakultas = Fakultas::all();
        $programstudi = ProgramStudi::all();

        // Query dasar
        $query = Mahasiswa::with(['fakultas', 'programStudi']);

        // Filter berdasarkan fakultas
        if ($request->filled('fakultas_id')) {
            $query->where('fakultas_id', $request->fakultas_id);
        }

        // Filter berdasarkan program studi
        if ($request->filled('program_studi_id')) {
            $query->where('program_studi_id', $request->program_studi_id);
        }

        // Filter berdasarkan NIM
        if ($request->filled('nim')) {
            $query->where('nim', 'like', '%' . $request->nim . '%');
        }

        $mahasiswa = $query->get();

        return view('mahasiswa.index', compact('mahasiswa', 'fakultas', 'programstudi'));
    }

    // ✅ Form tambah mahasiswa
    public function create()
    {
        $fakultas = Fakultas::all();
        $programstudi = ProgramStudi::all();
        return view('mahasiswa.create', compact('fakultas', 'programstudi'));
    }

    // ✅ Simpan data mahasiswa baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required|string|max:100',
            'fakultas_id' => 'required|exists:fakultas,id',
            'program_studi_id' => 'required|exists:program_studis,id', // ✅ perbaikan nama tabel
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    // ✅ Form edit mahasiswa
    public function edit(Mahasiswa $mahasiswa)
    {
        $fakultas = Fakultas::all();
        $programstudi = ProgramStudi::where('fakultas_id', $mahasiswa->fakultas_id)->get();

        return view('mahasiswa.edit', compact('mahasiswa', 'fakultas', 'programstudi'));
    }

    // ✅ Update data mahasiswa
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required|string|max:100',
            'fakultas_id' => 'required|exists:fakultas,id',
            'program_studi_id' => 'required|exists:program_studis,id', // ✅ perbaikan nama tabel
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    // ✅ Hapus data mahasiswa
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
