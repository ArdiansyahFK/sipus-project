<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="font-medium text-lg text-gray-900">{{ $category->name }}</h3>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                    <p class="text-gray-600">{{ $category->description ?? 'Tidak ada deskripsi' }}</p>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Total Buku</label>
                    <p class="text-gray-600">{{ $category->books->count() }} buku</p>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('categories.edit', $category->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none">
                        Edit
                    </a>
                    <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
