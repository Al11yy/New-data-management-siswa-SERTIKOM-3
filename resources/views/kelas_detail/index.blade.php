<x-app-layout>
<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h3>Riwayat Kelas Siswa</h3>
        <a href="{{ route('kelas-detail.create') }}" class="btn btn-primary">Tambah Riwayat</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Siswa</th>
                <th>Kelas</th>
                <th>Tahun Ajar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($details as $item)
                <tr>
                    <td>{{ $item->siswa->nama_lengkap }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->tahunAjar->nama_tahun_ajar }}</td>
                    <td>{{ $item->status }}</td>

                    <td>
                        <a href="{{ route('kelas-detail.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('kelas-detail.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus data?')"
                                    class="btn btn-danger btn-sm">
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
