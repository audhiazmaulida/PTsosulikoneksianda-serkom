<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Isi data awal website.
     * Jalankan: php artisan migrate:fresh --seed
     *
     * Galeri sengaja TIDAK di-seed: foto galeri wajib diunggah
     * lewat halaman admin (Galeri > + Tambah Galeri).
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ProfilSeeder::class,
            ProdukSeeder::class,
            ArtikelSeeder::class,
        ]);
    }
}