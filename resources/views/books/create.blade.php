<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
                        <select id="category_id" name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('category_id') border-red-500 @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block font-medium text-sm text-gray-700">Judul Buku</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('title') border-red-500 @enderror" required>
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="author" class="block font-medium text-sm text-gray-700">Penulis</label>
                        <input type="text" id="author" name="author" value="{{ old('author') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('author') border-red-500 @enderror" required>
                        @error('author')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="publisher" class="block font-medium text-sm text-gray-700">Penerbit</label>
                        <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('publisher') border-red-500 @enderror" required>
                        @error('publisher')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label for="year" class="block font-medium text-sm text-gray-700">Tahun Terbit</label>
                            <input type="number" id="year" name="year" value="{{ old('year') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('year') border-red-500 @enderror" required>
                            @error('year')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="stock" class="block font-medium text-sm text-gray-700">Stok</label>
                            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('stock') border-red-500 @enderror" required>
                            @error('stock')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Simpan
                        </button>
                        <a href="{{ route('books.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
