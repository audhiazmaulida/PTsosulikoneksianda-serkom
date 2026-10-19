<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Akun admin awal.
     * Jalankan: php artisan db:seed --class=AdminUserSeeder
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@solusikoneksianda.com'],
            [
                'name' => 'Administrator',
                'password' => 'admin123',
            ]
        );
    }
}