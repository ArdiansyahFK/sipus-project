<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="font-medium text-lg text-gray-900">{{ $book->title }}</h3>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Kategori</label>
                        <p class="text-gray-600">{{ $book->category->name }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Penulis</label>
                        <p class="text-gray-600">{{ $book->author }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Penerbit</label>
                        <p class="text-gray-600">{{ $book->publisher }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Tahun Terbit</label>
                        <p class="text-gray-600">{{ $book->year }}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Stok</label>
                        <p class="text-gray-600">{{ $book->stock }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none">
                        Edit
                    </a>
                    <a href="{{ route('books.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
