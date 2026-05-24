<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Sastra'],
            ['nama_kategori' => 'Pendidikan'],
            ['nama_kategori' => 'Komik'],
            ['nama_kategori' => 'Sejarah'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['nama_kategori' => $category['nama_kategori']],
                $category
            );
        }
    }
}
