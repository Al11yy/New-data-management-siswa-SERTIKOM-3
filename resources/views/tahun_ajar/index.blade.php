<x-app-layout>
<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Tahun Ajar</h3>
        <a href="{{ route('tahun_ajar.create') }}" class="btn btn-primary">Tambah Tahun Ajar</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Tahun Ajar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tahunAjars as $item)
                <tr>
                    <td>{{ $item->kode_tahun_ajar }}</td>
                    <td>{{ $item->nama_tahun_ajar }}</td>
                    <td>
                        <a href="{{ route('tahun_ajar.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('tahun_ajar.destroy', $item->id) }}" method="POST" style="display:inline-block;">
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