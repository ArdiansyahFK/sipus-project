<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="h4 mb-1">Data Siswa</h2>
                <p class="text-muted mb-0">Tampilkan informasi siswa lengkap dengan kelas dan kontak cepat.</p>
            </div>
            <a href="{{ route('students.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Siswa
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="form-card mb-4">
            <form method="GET" action="{{ route('students.index') }}" class="search-bar">
                <input type="text" name="search" class="search-input form-control" placeholder="Cari nama, NIS, atau kelas..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>

        <div class="row g-3">
            @forelse ($students as $student)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex gap-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 55px; height: 55px; font-size: 1.25rem;">
                                {{ strtoupper(substr($student->nama, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">{{ $student->nama }}</h5>
                                <p class="mb-1 text-muted">NIS: {{ $student->nis }}</p>
                                <span class="badge bg-secondary">{{ $student->kelas }}</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex flex-wrap gap-2">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center">Tidak ada siswa.</div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-app-layout>
