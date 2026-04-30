<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Urutan pemanggilan penting:
     *   1. AdminUserSeeder   → Buat akun admin default terlebih dahulu
     *   2. LearningContentSeeder → Isi data modul, lesson, block, dan quiz
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,        // Tahap 2: Admin user
            LearningContentSeeder::class,  // Tahap 6: Konten pembelajaran
        ]);
    }
}
