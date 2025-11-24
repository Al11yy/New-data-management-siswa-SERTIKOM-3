<x-app-layout>
<div class="container mt-4">
    <h3>Tambah Riwayat Kelas</h3>

    <form action="{{ route('kelas-detail.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Siswa</label>
            <select name="siswa_id" class="form-control" required>
                @foreach ($siswas as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="form-control" required>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahun Ajar</label>
            <select name="tahun_ajar_id" class="form-control" required>
                @foreach ($tahunAjars as $t)
                    <option value="{{ $t->id }}">{{ $t->nama_tahun_ajar }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas-detail.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
</x-app-layout>
