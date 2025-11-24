<x-app-layout>
<div class="container mt-4">

    <h3>Tambah Tahun Ajar</h3>

    <form action="{{ route('tahun_ajar.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kode Tahun Ajar</label>
            <input type="text" name="kode_tahun_ajar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Tahun Ajar</label>
            <input type="text" name="nama_tahun_ajar" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('tahun_ajar.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
</x-app-layout>
