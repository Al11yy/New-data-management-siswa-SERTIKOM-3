<x-app-layout>
<div class="container mt-4">
    <h3>Tambah Kelas</h3>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Level Kelas</label>
            <input type="number" name="level_kelas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control" required>
                <option value="">-- pilih jurusan --</option>

                @foreach ($jurusans as $j)
                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</x-app-layout>
