<?php

namespace App\Http\Controllers;

use App\Models\KelasDetail;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\kelas_detail;
use App\Models\tahun_ajar;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class KelasDetailController extends Controller
{
    public function index()
    {
        $details = kelas_detail::with(['siswa', 'kelas', 'tahunAjar'])
            ->latest()->get();

        return view('kelas_detail.index', compact('details'));
    }

    public function create()
    {
        return view('kelas_detail.create', [
            'siswas' => Siswa::all(),
            'kelas' => Kelas::all(),
            'tahunAjars' => tahun_ajar::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        kelas_detail::create($request->all());

        return redirect()->route('kelas-detail.index')
            ->with('success', 'Detail kelas berhasil ditambahkan.');
    }

    public function edit(kelas_detail $kelasDetail)
    {
        return view('kelas_detail.edit', [
            'detail' => $kelasDetail,
            'siswas' => Siswa::all(),
            'kelas' => Kelas::all(),
            'tahunAjars' => tahun_ajar::all(),
        ]);
    }

    public function update(Request $request, kelas_detail $kelasDetail)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $kelasDetail->update($request->all());

        return redirect()->route('kelas-detail.index')
            ->with('success', 'Detail kelas berhasil diperbarui.');
    }

    public function destroy(kelas_detail $kelasDetail)
    {
        $kelasDetail->delete();

        return redirect()->route('kelas-detail.index')
            ->with('success', 'Detail kelas berhasil dihapus.');
    }
}
