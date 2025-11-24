<?php

namespace App\Http\Controllers;

use App\Models\tahun_ajar;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjarController extends Controller
{
    public function index()
    {
        $tahunAjars = tahun_ajar::latest()->get();
        return view('tahun_ajar.index', compact('tahunAjars'));
    }

    public function create()
    {
        return view('tahun_ajar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_tahun_ajar' => 'required|unique:tahun_ajars,kode_tahun_ajar',
            'nama_tahun_ajar' => 'required',
        ]);

        tahun_ajar::create($request->all());

        return redirect()->route('tahun_ajar.index')
            ->with('success', 'Tahun ajar berhasil ditambahkan.');
    }

    public function edit(tahun_ajar $tahunAjar)
    {
        return view('tahun_ajar.edit', compact('tahunAjar'));
    }

    public function update(Request $request, tahun_ajar $tahunAjar)
    {
        $request->validate([
            'kode_tahun_ajar' => 'required|unique:tahun_ajars,kode_tahun_ajar,' . $tahunAjar->id,
            'nama_tahun_ajar' => 'required',
        ]);

        $tahunAjar->update($request->all());

        return redirect()->route('tahun_ajar.index')
            ->with('success', 'Tahun ajar berhasil diperbarui.');
    }

    public function destroy(tahun_ajar $tahunAjar)
    {
        $tahunAjar->delete();

        return redirect()->route('tahun_ajar.index')
            ->with('success', 'Tahun ajar berhasil dihapus.');
    }
}
