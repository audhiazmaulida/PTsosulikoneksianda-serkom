<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Bikin 1 akun admin awal. Jalankan sekali aja pas setup pertama:
     * php artisan db:seed --class=AdminUserSeeder
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@smkn4bogor.sch.id'],
            [
                'name' => 'Administrator',
                'password' => 'admin123', 
            ]
        );
    }
}