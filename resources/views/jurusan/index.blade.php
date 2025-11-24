<x-app-layout>
<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Jurusan</h3>
        <a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah Jurusan</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($jurusans as $item)
                <tr>
                    <td>{{ $item->kode_jurusan }}</td>
                    <td>{{ $item->nama_jurusan }}</td>
                    <td>
                        <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('jurusan.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
</x-app-layout>
