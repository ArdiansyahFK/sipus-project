<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="h4 mb-1">Halaman Peminjaman</h2>
                <p class="text-muted mb-0">Kelola transaksi pinjam dan kembalikan buku dengan mudah.</p>
            </div>
            <a href="{{ route('borrowings.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Peminjaman
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
        @endif

        <div class="form-card mb-4">
            <form method="GET" action="{{ route('borrowings.index') }}" class="row g-3 align-items-center">
                <div class="col-md-8">
                    <select name="status" class="form-control">
                        <option value="">-- Semua Status --</option>
                        <option value="dipinjam" {{ request('status') === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ request('status') === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        <option value="terlambat" {{ request('status') === 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                    </select>
                </div>
                <div class="col-md-4 d-grid">
                    <button type="submit" class="btn btn-primary">Filter Status</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Buku</th>
                            <th>Siswa</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($borrowings as $borrowing)
                            <tr>
                                <td>{{ $borrowings->firstItem() + $loop->index }}</td>
                                <td>{{ $borrowing->book->judul ?? '-' }}</td>
                                <td>{{ $borrowing->student->nama ?? '-' }}</td>
                                <td>{{ optional($borrowing->tanggal_pinjam)->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge badge-status @if($borrowing->status === 'dipinjam') badge-dipinjam @elseif($borrowing->status === 'dikembalikan') badge-dikembalikan @else badge-terlambat @endif">
                                        {{ ucfirst($borrowing->status) }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('borrowings.show', $borrowing->id) }}" class="btn btn-sm btn-secondary">Lihat</a>
                                    <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Tidak ada peminjaman</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $borrowings->links() }}
        </div>
    </div>
</x-app-layout>
