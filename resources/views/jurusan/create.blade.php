<x-app-layout>
<div class="container mt-4">
    <h3>Tambah Jurusan</h3>

    <form action="{{ route('jurusan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kode Jurusan</label>
            <input type="text" name="kode_jurusan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</x-app-layout>
