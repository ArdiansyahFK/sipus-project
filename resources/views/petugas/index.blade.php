<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="h4 mb-1">Data Petugas</h2>
                <p class="text-muted mb-0">Kelola petugas perpustakaan dengan tampilan bersih dan profesional.</p>
            </div>
            <a href="{{ route('petugas.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus"></i> Tambah Petugas
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="table-container">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jenis Kelamin</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($petugas as $item)
                            <tr>
                                <td>{{ $petugas->firstItem() + $loop->index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>
                                    <span class="badge badge-status {{ $item->jk === 'L' ? 'badge-dipinjam' : 'badge-dikembalikan' }}">
                                        {{ $item->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td>{{ $item->telepon ?? '-' }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('petugas.show', $item->id) }}" class="btn btn-sm btn-secondary">Lihat</a>
                                    <a href="{{ route('petugas.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('petugas.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada data petugas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $petugas->links() }}
        </div>
    </div>
</x-app-layout>
