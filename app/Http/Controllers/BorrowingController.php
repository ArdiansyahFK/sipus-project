<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Student;
use App\Models\Petugas;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['book', 'student', 'petugas']);

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $borrowings = $query->paginate(10);
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('stok', '>', 0)->get();
        $students = Student::all();
        $petugas = Petugas::all();
        return view('borrowings.create', compact('books', 'students', 'petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'siswa_id' => 'required|exists:siswa,id',
            'petugas_id' => 'required|exists:petugas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat',
            'denda' => 'required|numeric|min:0',
        ]);

        Borrowing::create($validated);

        if ($validated['status'] === 'dipinjam') {
            $book = Book::find($validated['buku_id']);
            $book->decrement('stok');
        }

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dicatat');
    }

    public function show(Borrowing $borrowing)
    {
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        $students = Student::all();
        $petugas = Petugas::all();
        return view('borrowings.edit', compact('borrowing', 'books', 'students', 'petugas'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'siswa_id' => 'required|exists:siswa,id',
            'petugas_id' => 'required|exists:petugas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat',
            'denda' => 'required|numeric|min:0',
        ]);

        if ($borrowing->status === 'dipinjam' && in_array($validated['status'], ['dikembalikan', 'terlambat'])) {
            $book = Book::find($validated['buku_id']);
            $book->increment('stok');
        } elseif (in_array($borrowing->status, ['dikembalikan', 'terlambat']) && $validated['status'] === 'dipinjam') {
            $book = Book::find($validated['buku_id']);
            $book->decrement('stok');
        }

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil diubah');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'dipinjam') {
            $borrowing->book->increment('stok');
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dihapus');
    }
}
