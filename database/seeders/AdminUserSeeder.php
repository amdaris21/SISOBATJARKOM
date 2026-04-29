<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class AdminUserSeeder extends Seeder
{
    /**
     * Buat atau perbarui akun admin default.
     * Email: admin@sisobatjarkom.com
     * Password: admin123
     * Role: admin
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@sisobatjarkom.com'],
            [
                'name' => 'Admin SisobatJarkom',
                'password' => 'admin123', // Otomatis di-hash oleh cast 'hashed' di User model
                'role' => 'admin',
            ]
        );

        // Logging: catat apakah admin baru dibuat atau diperbarui
        if ($admin->wasRecentlyCreated) {
            Log::info('AdminUserSeeder: Admin default berhasil DIBUAT.', [
                'user_id' => $admin->id,
                'email' => $admin->email,
            ]);
        } else {
            Log::info('AdminUserSeeder: Admin default berhasil DIPERBARUI.', [
                'user_id' => $admin->id,
                'email' => $admin->email,
            ]);
        }
    }
}
