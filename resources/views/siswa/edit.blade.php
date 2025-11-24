<x-app-layout>
    <div class="container mt-4">
        <h3>Edit Siswa</h3>

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NISN --}}
            <div class="mb-3">
                <label>NISN</label>
                <input
                    type="text"
                    name="nisn"
                    class="form-control"
                    value="{{ old('nisn', $siswa->nisn) }}"
                    required
                >
            </div>

            {{-- Nama Lengkap --}}
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input
                    type="text"
                    name="nama_lengkap"
                    class="form-control"
                    value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}"
                    required
                >
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">-- pilih --</option>
                    <option value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input
                    type="date"
                    name="tanggal_lahir"
                    class="form-control"
                    value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                    required
                >
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>

            {{-- Jurusan --}}
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan_id" class="form-control" required>
                    @foreach ($jurusans as $j)
                        <option value="{{ $j->id }}"
                            {{ old('jurusan_id', $siswa->jurusan_id) == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jurusan }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Kelas --}}
            <div class="mb-3">
                <label>Kelas</label>
                <select name="kelas_id" class="form-control" required>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}"
                            {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tahun Ajar --}}
            <div class="mb-3">
                <label>Tahun Ajar</label>
                <select name="tahun_ajar_id" class="form-control" required>
                    @foreach ($tahunAjars as $t)
                        <option value="{{ $t->id }}"
                            {{ old('tahun_ajar_id', $siswa->tahun_ajar_id) == $t->id ? 'selected' : '' }}>
                            {{ $t->nama_tahun_ajar }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
    </x-app-layout>
