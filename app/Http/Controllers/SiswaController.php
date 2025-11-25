<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\tahun_ajar;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with(['jurusan', 'kelas', 'tahunAjar'])
            ->latest()->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create', [
            'jurusans' => Jurusan::all(),
            'kelas' => Kelas::all(),
            'tahunAjars' => tahun_ajar::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
            'jurusans' => Jurusan::all(),
            'kelas' => Kelas::all(),
            'tahunAjars' => tahun_ajar::all(),
        ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required|unique:siswas,nisn,' . $siswa->id,
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dihapus.');
    }

    public function show(Siswa $siswa)
    {
        // load relasi yang dibutuhkan
        $siswa->load(['kelas', 'jurusan', 'tahunAjar', 'kelasDetails.kelas', 'kelasDetails.tahunAjar']);

        // semua kelas untuk dropdown modal edit
        $allKelas = Kelas::all();

        return view('siswa.detail', compact('siswa', 'allKelas'));
    }


}
