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
        // 1. Akun Admin (Tahap 2)
        $this->call(AdminUserSeeder::class);

        // 2. Akun User Testing untuk Tugas 9 (Auth Demo)
        \App\Models\User::updateOrCreate(
            ['email' => 'tupaikidal@test.com'],
            [
                'name' => 'Tupai Kidal',
                'password' => 'Kambingguling_001', // Otomatis di-hash oleh model
                'role' => 'user',
            ]
        );

        // 3. Konten Pembelajaran (Tahap 6)
        $this->call(LearningContentSeeder::class);
    }
}
