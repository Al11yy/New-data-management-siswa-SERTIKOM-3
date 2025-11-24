<x-app-layout>
<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h3>Data Siswa</h3>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Jurusan</th>
                <th>Kelas</th>
                <th>Tahun Ajar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswas as $item)
                <tr>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->jurusan->nama_jurusan }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->tahunAjar->nama_tahun_ajar }}</td>

                    <td>
                        <a href="{{ route('siswa.edit', $item->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('siswa.destroy', $item->id) }}"
                              method="POST" style="display:inline-block;">
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
