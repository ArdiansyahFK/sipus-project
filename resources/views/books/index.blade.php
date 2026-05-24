<x-app-layout>
    <div class="space-y-6">
        <div class="rounded-[32px] bg-white p-6 shadow-soft">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-900">Data Buku</h2>
                    <p class="mt-2 text-slate-500">Kelola koleksi buku dengan cepat dan mudah.</p>
                </div>
                <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                    <i class="bi bi-plus-lg mr-2"></i> Tambah Buku
                </a>
            </div>

            @if ($message = Session::get('success'))
                <div class="mt-5 rounded-3xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                    {{ $message }}
                </div>
            @endif

            <form method="GET" action="{{ route('books.index') }}" class="mt-6 grid gap-4 sm:grid-cols-[1.8fr_1fr_auto]">
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-slate-400">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul, penulis, atau penerbit..." class="w-full rounded-3xl border border-slate-200 bg-slate-50 py-3 pl-12 pr-4 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:ring-2 focus:ring-slate-200" />
                </div>

                @if(isset($categories) && $categories->count())
                    <select name="category" class="rounded-3xl border border-slate-200 bg-slate-50 py-3 px-4 text-sm text-slate-900 outline-none transition focus:border-slate-400 focus:ring-2 focus:ring-slate-200">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                @endif

                <button type="submit" class="rounded-3xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Cari</button>
            </form>
        </div>

        <div class="overflow-hidden rounded-[32px] bg-white shadow-soft">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-slate-900">
                        <tr>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">Penulis</th>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">Tahun</th>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 font-semibold uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse ($books as $book)
                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-4">{{ $books->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-4">{{ $book->judul }}</td>
                                <td class="px-6 py-4">{{ $book->penulis }}</td>
                                <td class="px-6 py-4">{{ $book->category->nama_kategori ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $book->tahun }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $book->stok > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                        {{ $book->stok > 0 ? 'Tersedia' : 'Habis' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="inline-flex flex-wrap items-center gap-2">
                                        <a href="{{ route('books.show', $book->id) }}" class="inline-flex items-center rounded-2xl bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-200">Lihat</a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center rounded-2xl bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-200">Edit</a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center rounded-2xl bg-rose-100 px-3 py-2 text-xs font-semibold text-rose-700 transition hover:bg-rose-200" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-sm text-slate-500">Tidak ada buku</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex justify-center">
            {{ $books->links() }}
        </div>
    </div>
</x-app-layout>
