<x-app-layout>
<div class="container mt-4">
    <h3>Edit Kelas</h3>

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control"
                   value="{{ $kelas->nama_kelas }}" required>
        </div>

        <div class="mb-3">
            <label>Level Kelas</label>
            <input type="number" name="level_kelas" class="form-control"
                   value="{{ $kelas->level_kelas }}" required>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control" required>
                @foreach ($jurusans as $j)
                    <option value="{{ $j->id }}"
                        {{ $kelas->jurusan_id == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
</x-app-layout>
