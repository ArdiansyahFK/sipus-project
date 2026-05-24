<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $books = [
            [
                'judul' => 'Algoritma JavaScript Modern',
                'penulis' => 'Nina Arista',
                'penerbit' => 'Grafindo',
                'tahun' => 2023,
                'stok' => 7,
                'kategori' => 'Teknologi',
            ],
            [
                'judul' => 'Seni Menjadi Pribadi Unggul',
                'penulis' => 'Rafi Alfiansyah',
                'penerbit' => 'Erlangga',
                'tahun' => 2022,
                'stok' => 4,
                'kategori' => 'Pendidikan',
            ],
            [
                'judul' => 'Legenda Cibinong',
                'penulis' => 'Dewi Laras',
                'penerbit' => 'Mizan',
                'tahun' => 2021,
                'stok' => 5,
                'kategori' => 'Sastra',
            ],
            [
                'judul' => 'Sejarah Indonesia untuk Remaja',
                'penulis' => 'Hendra Saputra',
                'penerbit' => 'Gramedia',
                'tahun' => 2020,
                'stok' => 6,
                'kategori' => 'Sejarah',
            ],
            [
                'judul' => 'Komik Petualangan Kelas XR1',
                'penulis' => 'Arman Putra',
                'penerbit' => 'Elex Media',
                'tahun' => 2024,
                'stok' => 10,
                'kategori' => 'Komik',
            ],
        ];

        foreach ($books as $bookData) {
            $kategori = Category::where('nama_kategori', $bookData['kategori'])->first();

            Book::updateOrCreate(
                ['judul' => $bookData['judul']],
                [
                    'kategori_id' => $kategori->id,
                    'penulis' => $bookData['penulis'],
                    'penerbit' => $bookData['penerbit'],
                    'tahun' => $bookData['tahun'],
                    'stok' => $bookData['stok'],
                ]
            );
        }
    }
}
