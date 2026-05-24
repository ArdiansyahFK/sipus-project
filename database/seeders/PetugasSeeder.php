<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $staff = [
            ['nip' => '9001001', 'nama' => 'Dina Putri', 'jk' => 'P', 'telepon' => '081234567890', 'foto' => null],
            ['nip' => '9001002', 'nama' => 'Galih Pratama', 'jk' => 'L', 'telepon' => '081298765432', 'foto' => null],
            ['nip' => '9001003', 'nama' => 'Maya Anindya', 'jk' => 'P', 'telepon' => '081223344556', 'foto' => null],
        ];

        foreach ($staff as $item) {
            Petugas::updateOrCreate(
                ['nip' => $item['nip']],
                $item
            );
        }
    }
}
