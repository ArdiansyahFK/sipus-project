<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4">
            <div>
                <h2 class="h4 mb-1">Kategori Buku</h2>
                <p class="text-muted mb-0">Atur kategori buku untuk memudahkan navigasi koleksi.</p>
            </div>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Kategori
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
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $loop->index }}</td>
                                <td>{{ $category->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-secondary">Lihat</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Tidak ada kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</x-app-layout>
