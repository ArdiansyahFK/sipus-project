<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Student;
use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $data = [
            [
                'siswa' => 'Alya Nabila',
                'buku' => 'Algoritma JavaScript Modern',
                'petugas' => 'Dina Putri',
                'tanggal_pinjam' => '2026-05-10',
                'tanggal_kembali' => null,
                'status' => 'dipinjam',
                'denda' => 0,
            ],
            [
                'siswa' => 'Zayn Ardi',
                'buku' => 'Sejarah Indonesia untuk Remaja',
                'petugas' => 'Galih Pratama',
                'tanggal_pinjam' => '2026-04-10',
                'tanggal_kembali' => '2026-04-20',
                'status' => 'dikembalikan',
                'denda' => 0,
            ],
            [
                'siswa' => 'Naya Fathir',
                'buku' => 'Komik Petualangan Kelas XR1',
                'petugas' => 'Maya Anindya',
                'tanggal_pinjam' => '2026-04-01',
                'tanggal_kembali' => '2026-04-18',
                'status' => 'terlambat',
                'denda' => 35000,
            ],
        ];

        foreach ($data as $item) {
            $siswa = Student::where('nama', $item['siswa'])->first();
            $buku = Book::where('judul', $item['buku'])->first();
            $petugas = Petugas::where('nama', $item['petugas'])->first();

            Borrowing::updateOrCreate(
                [
                    'siswa_id' => $siswa->id,
                    'buku_id' => $buku->id,
                    'petugas_id' => $petugas->id,
                    'tanggal_pinjam' => $item['tanggal_pinjam'],
                ],
                [
                    'tanggal_kembali' => $item['tanggal_kembali'],
                    'status' => $item['status'],
                    'denda' => $item['denda'],
                ]
            );
        }
    }
}
