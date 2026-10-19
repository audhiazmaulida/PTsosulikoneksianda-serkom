<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * 8 foto galeri. 'foto' = nama file di public/images/galeri/.
     * Kategori yang dipakai: Kegiatan, Kantor, Proyek.
     */
    public function run(): void
    {
        $galeris = [
            ['foto' => 'kegiatan1.jpg', 'kategori' => 'Kegiatan', 'tanggal' => '2026-09-10', 'deskripsi' => 'Workshop transformasi digital untuk UMKM.'],
            ['foto' => 'kegiatan2.jpg', 'kategori' => 'Kegiatan', 'tanggal' => '2026-08-20', 'deskripsi' => 'Pelatihan internal tim developer.'],
            ['foto' => 'kegiatan3.jpg', 'kategori' => 'Kegiatan', 'tanggal' => '2026-07-17', 'deskripsi' => 'Gathering dan kebersamaan seluruh tim.'],
            ['foto' => 'kegiatan4.jpg', 'kategori' => 'Kegiatan', 'tanggal' => '2026-06-05', 'deskripsi' => 'Kunjungan dan presentasi layanan ke klien.'],
            ['foto' => 'kegiatan5.jpg', 'kategori' => 'Kantor', 'tanggal' => '2026-05-12', 'deskripsi' => 'Ruang kerja tim PT Solusi Koneksi Anda.'],
            ['foto' => 'kegiatan6.jpg', 'kategori' => 'Kantor', 'tanggal' => '2026-04-18', 'deskripsi' => 'Ruang rapat dan diskusi proyek.'],
            ['foto' => 'kegiatan7.jpg', 'kategori' => 'Proyek', 'tanggal' => '2026-08-28', 'deskripsi' => 'Pemasangan jaringan kantor cabang klien.'],
            ['foto' => 'kegiatan8.jpg', 'kategori' => 'Proyek', 'tanggal' => '2026-03-25', 'deskripsi' => 'Instalasi CCTV dan perangkat keamanan.'],
        ];

        foreach ($galeris as $item) {
            Galeri::updateOrCreate(
                ['foto' => $item['foto']],
                $item
            );
        }
    }
}