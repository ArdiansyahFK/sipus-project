<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'siswa_id',
        'buku_id',
        'petugas_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'denda',
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
        'denda' => 'decimal:2',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'siswa_id');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
