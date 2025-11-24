<x-app-layout>
<div class="container mt-4">
    <h3>Edit Riwayat Kelas</h3>

    <form action="{{ route('kelas-detail.update', $detail->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Siswa</label>
            <select name="siswa_id" class="form-control" required>
                @foreach ($siswas as $s)
                    <option value="{{ $s->id }}"
                        {{ $detail->siswa_id == $s->id ? 'selected' : '' }}>
                        {{ $s->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="form-control" required>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}"
                        {{ $detail->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tahun Ajar</label>
            <select name="tahun_ajar_id" class="form-control" required>
                @foreach ($tahunAjars as $t)
                    <option value="{{ $t->id }}"
                        {{ $detail->tahun_ajar_id == $t->id ? 'selected' : '' }}>
                        {{ $t->nama_tahun_ajar }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ $detail->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $detail->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('kelas-detail.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
</x-app-layout>
