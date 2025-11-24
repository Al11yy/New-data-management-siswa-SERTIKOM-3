<x-app-layout>
<div class="container mt-4">

    <h3>Edit Tahun Ajar</h3>

    <form action="{{ route('tahun_ajar.update', $tahunAjar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode Tahun Ajar</label>
            <input type="text" name="kode_tahun_ajar" class="form-control" value="{{ $tahunAjar->kode_tahun_ajar }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Tahun Ajar</label>
            <input type="text" name="nama_tahun_ajar" class="form-control" value="{{ $tahunAjar->nama_tahun_ajar }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('tahun_ajar.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>
</x-app-layout>
