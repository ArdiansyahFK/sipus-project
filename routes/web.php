<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Petugas;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $summary = [
        'books' => Book::count(),
        'students' => Student::count(),
        'categories' => Category::count(),
        'borrowings' => Borrowing::count(),
        'borrowed' => Borrowing::where('status', 'dipinjam')->count(),
        'petugas' => Petugas::count(),
    ];

    return view('dashboard', compact('summary'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Routes
    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('students', StudentController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('borrowings', BorrowingController::class);

    Route::get('/reports', function () {
        $summary = [
            'books' => Book::count(),
            'students' => Student::count(),
            'categories' => Category::count(),
            'borrowings' => Borrowing::count(),
            'borrowed' => Borrowing::where('status', 'dipinjam')->count(),
            'petugas' => Petugas::count(),
        ];

        return view('reports.index', compact('summary'));
    })->name('reports');
});

require __DIR__.'/auth.php';
