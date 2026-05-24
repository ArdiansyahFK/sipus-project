<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="book_id" class="block font-medium text-sm text-gray-700">Buku</label>
                        <select id="book_id" name="book_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('book_id') border-red-500 @enderror" required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id', $borrowing->book_id) == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="student_id" class="block font-medium text-sm text-gray-700">Siswa</label>
                        <select id="student_id" name="student_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('student_id') border-red-500 @enderror" required>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id', $borrowing->student_id) == $student->id ? 'selected' : '' }}>{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label for="borrowed_at" class="block font-medium text-sm text-gray-700">Tanggal Pinjam</label>
                            <input type="date" id="borrowed_at" name="borrowed_at" value="{{ old('borrowed_at', $borrowing->borrowed_at->format('Y-m-d')) }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('borrowed_at') border-red-500 @enderror" required>
                            @error('borrowed_at')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="returned_at" class="block font-medium text-sm text-gray-700">Tanggal Kembali</label>
                            <input type="date" id="returned_at" name="returned_at" value="{{ old('returned_at', $borrowing->returned_at?->format('Y-m-d')) }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('returned_at') border-red-500 @enderror">
                            @error('returned_at')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                        <select id="status" name="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 @error('status') border-red-500 @enderror" required>
                            <option value="borrowed" {{ old('status', $borrowing->status) === 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="returned" {{ old('status', $borrowing->status) === 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                        @error('status')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Perbarui
                        </button>
                        <a href="{{ route('borrowings.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 focus:outline-none">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
