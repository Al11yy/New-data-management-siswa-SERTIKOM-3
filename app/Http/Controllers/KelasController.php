<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('jurusan')->latest()->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('kelas.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required|integer|min:1|max:12',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela)
    {
        $jurusans = Jurusan::all();
        return view('kelas.edit', [
            'kelas' => $kela,
            'jurusans' => $jurusans
        ]);
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'level_kelas' => 'required|integer|min:1|max:12',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $kela->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}
