<x-app-layout>
<div class="container mt-4">
    <h3>Edit Jurusan</h3>

    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kode Jurusan</label>
            <input type="text" name="kode_jurusan"
                   class="form-control"
                   value="{{ $jurusan->kode_jurusan }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan"
                   class="form-control"
                   value="{{ $jurusan->nama_jurusan }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</x-app-layout>
