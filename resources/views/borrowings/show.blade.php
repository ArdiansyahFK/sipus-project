<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Buku</label>
                        <p class="text-gray-600">{{ $borrowing->book->title }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Siswa</label>
                        <p class="text-gray-600">{{ $borrowing->student->name }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Tanggal Pinjam</label>
                        <p class="text-gray-600">{{ $borrowing->borrowed_at->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Tanggal Kembali</label>
                        <p class="text-gray-600">{{ $borrowing->returned_at?->format('d/m/Y') ?? 'Belum dikembalikan' }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Status</label>
                        <p class="text-gray-600">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium @if ($borrowing->status === 'borrowed') bg-blue-100 text-blue-800 @else bg-green-100 text-green-800 @endif">
                                {{ $borrowing->status === 'borrowed' ? 'Dipinjam' : 'Dikembalikan' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none">
                        Edit
                    </a>
                    <a href="{{ route('borrowings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
