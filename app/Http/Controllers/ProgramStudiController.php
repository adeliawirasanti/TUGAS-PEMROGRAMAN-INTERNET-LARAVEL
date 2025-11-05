<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    // Tampilkan semua data program studi
    public function index()
    {
        $programstudi = ProgramStudi::with('fakultas')->get();
        return view('programstudi.index', compact('programstudi'));
    }

    // Form tambah data
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('programstudi.create', compact('fakultas'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);

        ProgramStudi::create($request->all());
        return redirect()->route('programstudi.index')->with('success', 'Program Studi berhasil ditambahkan!');
    }

    // Form edit data
    public function edit($id)
    {
        $programstudi = ProgramStudi::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('programstudi.edit', compact('programstudi', 'fakultas'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);

        $programstudi = ProgramStudi::findOrFail($id);
        $programstudi->update($request->all());

        return redirect()->route('programstudi.index')->with('success', 'Program Studi berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        $programstudi = ProgramStudi::findOrFail($id);
        $programstudi->delete();

        return redirect()->route('programstudi.index')->with('success', 'Program Studi berhasil dihapus!');
    }
}
