<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        Fakultas::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan!');
    }

    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
        ]);

        $fakultas->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui!');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus!');
    }
}

