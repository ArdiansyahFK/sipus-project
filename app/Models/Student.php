<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'kelas',
        'nis',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'foto',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class, 'siswa_id');
    }
}
