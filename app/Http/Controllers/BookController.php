<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('penulis', 'like', "%{$search}%")
                ->orWhere('penerbit', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('kategori_id', $request->input('category'));
        }

        $books = $query->paginate(10);
        $categories = Category::orderBy('nama_kategori')->get();

        return view('books.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
            'stok' => 'required|numeric|min:0',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
            'stok' => 'required|numeric|min:0',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diubah');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}
