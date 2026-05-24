<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'btmin@gmail.com'],
            [
                'name' => 'Admin SIPUS PGRI',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
            StudentSeeder::class,
            PetugasSeeder::class,
            BorrowingSeeder::class,
        ]);
    }
}
