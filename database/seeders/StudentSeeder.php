<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $students = [
            ['nama' => 'Alya Nabila', 'kelas' => 'XR1', 'nis' => '12001'],
            ['nama' => 'Zayn Ardi', 'kelas' => 'XR2', 'nis' => '12002'],
            ['nama' => 'Naya Fathir', 'kelas' => 'XIU6', 'nis' => '11003'],
            ['nama' => 'Mira Cipta', 'kelas' => 'XIIP4', 'nis' => '11004'],
            ['nama' => 'Raka Kurnia', 'kelas' => 'XRP2', 'nis' => '12005'],
        ];

        foreach ($students as $studentData) {
            Student::updateOrCreate(
                ['nis' => $studentData['nis']],
                $studentData
            );
        }
    }
}
