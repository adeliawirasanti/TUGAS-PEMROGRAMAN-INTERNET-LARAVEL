<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        $m = Mahasiswa::findOrFail($id);
        $m->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $m = Mahasiswa::findOrFail($id);
        $m->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
