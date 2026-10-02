<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Isi awal tabel galeris. Beda dari versi hardcode sebelumnya:
     * di sini SATU foto = SATU kategori (gak ada lagi duplikat/dobel
     * kategori kayak dulu). Kalau ke depan mau ubah kategori foto,
     * tinggal edit lewat halaman admin, gak perlu ubah kode lagi.
     */
    public function run(): void
    {
        $galeris = [
            // Kegiatan
            ['foto' => 'galeri8.JPG', 'kategori' => 'Kegiatan', 'tanggal' => '2026-01-10'],
            ['foto' => 'galeri9.webp', 'kategori' => 'Kegiatan', 'tanggal' => '2026-01-15'],
            ['foto' => 'galeri11.JPG', 'kategori' => 'Kegiatan', 'tanggal' => '2026-02-01'],
            ['foto' => 'galeri15.JPG', 'kategori' => 'Kegiatan', 'tanggal' => '2026-02-10'],
            ['foto' => 'galeri17.png', 'kategori' => 'Kegiatan', 'tanggal' => '2026-03-01'],
            ['foto' => 'galeri18.webp', 'kategori' => 'Kegiatan', 'tanggal' => '2026-03-05'],
            ['foto' => 'galeri19.webp', 'kategori' => 'Kegiatan', 'tanggal' => '2026-03-10'],
            ['foto' => 'galeri20.webp', 'kategori' => 'Kegiatan', 'tanggal' => '2026-03-15'],

            // Fasilitas
            ['foto' => 'galeri10.JPG', 'kategori' => 'Fasilitas', 'tanggal' => '2026-01-20'],
            ['foto' => 'galeri21.JPG', 'kategori' => 'Fasilitas', 'tanggal' => '2026-04-01'],
            ['foto' => 'galeri22.webp', 'kategori' => 'Fasilitas', 'tanggal' => '2026-04-05'],
            ['foto' => 'galeri23.jpg', 'kategori' => 'Fasilitas', 'tanggal' => '2026-04-10'],
            ['foto' => 'galeri24.jpeg', 'kategori' => 'Fasilitas', 'tanggal' => '2026-04-15'],
            ['foto' => 'galeri25.jpeg', 'kategori' => 'Fasilitas', 'tanggal' => '2026-04-20'],
            ['foto' => 'galeri26.JPG', 'kategori' => 'Fasilitas', 'tanggal' => '2026-04-25'],
            ['foto' => 'galeri35.jpg', 'kategori' => 'Fasilitas', 'tanggal' => '2026-05-01'],

            // Prestasi
            ['foto' => 'galeri27.webp', 'kategori' => 'Prestasi', 'tanggal' => '2025-09-01'],
            ['foto' => 'galeri28.webp', 'kategori' => 'Prestasi', 'tanggal' => '2025-09-10'],
            ['foto' => 'galeri29.webp', 'kategori' => 'Prestasi', 'tanggal' => '2025-09-20'],
            ['foto' => 'galeri30.webp', 'kategori' => 'Prestasi', 'tanggal' => '2025-10-01'],
            ['foto' => 'galeri31.webp', 'kategori' => 'Prestasi', 'tanggal' => '2025-10-10'],
            ['foto' => 'galeri32.webp', 'kategori' => 'Prestasi', 'tanggal' => '2025-10-20'],
            ['foto' => 'galeri33.jpg', 'kategori' => 'Prestasi', 'tanggal' => '2025-11-01'],
            ['foto' => 'galeri34.jpg', 'kategori' => 'Prestasi', 'tanggal' => '2025-11-10'],
        ];

        foreach ($galeris as $item) {
            Galeri::create($item);
        }
    }
}