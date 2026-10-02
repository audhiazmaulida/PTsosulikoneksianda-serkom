<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Pindahin 12 artikel yang tadinya hardcode di ArtikelController
     * ke database, biar kontennya gak ilang pas kita ganti sistem.
     * Jalankan sekali: php artisan db:seed --class=ArtikelSeeder
     */
    public function run(): void
    {
        $artikels = [
            ['gambar' => 'artikel3.webp', 'kategori' => 'Kegiatan', 'judul' => 'Upacara Peringatan Hari Anak Nasional.', 'deskripsi' => 'Kegiatan ini dilaksanakan di lapangan SMK Negeri 4 Bogor pada hari Kamis, 23 Juli 2026.', 'tanggal_publikasi' => '2026-07-23'],
            ['gambar' => 'artikel4.webp', 'kategori' => 'Prestasi', 'judul' => 'Juara 2 Tanding Putri kelas B pada Kejuaraan Pencak Silat IPB Championship', 'deskripsi' => 'SMKN 4 Bogor mengucapkan Selamat kepada Siti Salma -X TJKT 2 atas prestasi yang diraih.', 'tanggal_publikasi' => '2026-06-01'],
            ['gambar' => 'artikel5.webp', 'kategori' => 'Pengumuman', 'judul' => 'Perpisahan Siswa Siswi SMKN 4 Bogor Tahun Ajaran 2025/2026.', 'deskripsi' => 'Selamat melangkah dan menggapai cita-cita untuk seluruh siswa siswi kelas XII. Semoga sukses selalu menyertai di setiap perjalanan berikutnya.', 'tanggal_publikasi' => '2026-05-21'],
            ['gambar' => 'artikel6.jpg', 'kategori' => 'Lingkungan', 'judul' => 'Aksi Ekologi Pancawaluya – Bebersih Lingkungan', 'deskripsi' => 'Pelaksanaan Aksi Ekologi Pancawaluya dengan kegiatan bebersih lingkungan yang dilaksanakan di dalam dan di luar lingkungan SMKN 4 Bogor.', 'tanggal_publikasi' => '2026-07-21'],
            ['gambar' => 'artikel7.webp', 'kategori' => 'Ekstrakurikuler', 'judul' => 'Selamat dan Sukses', 'deskripsi' => 'Kami mengucapkan selamat dan apresiasi setinggi-tingginya kepada para siswa-siswi yang telah mengharumkan nama sekolah melalui berbagai prestasi membanggakan.', 'tanggal_publikasi' => '2026-01-20'],
            ['gambar' => 'artikel8.webp', 'kategori' => 'Edukasi', 'judul' => 'Kegiatan Program Health Kesehatan Remaja', 'deskripsi' => 'Berbasis Sekolah Oleh Guru Bimbingan Konseling (BK) dan Pendidikan Jasmani, Olahraga, dan Kesehatan (PJOK) Day 1. Kegiatan ini dilakukan di Aula SMKN 4 Bogor', 'tanggal_publikasi' => '2026-04-16'],
            ['gambar' => 'artikel9.webp', 'kategori' => 'Kegiatan', 'judul' => 'Lomba SAGA VOL II SMKN 4 Bogor.', 'deskripsi' => 'Kegiatan ini dilaksanakan di Aula dan Lapangan SMKN 4 Bogor.', 'tanggal_publikasi' => '2026-06-17'],
            ['gambar' => 'artikel10.webp', 'kategori' => 'Prestasi', 'judul' => 'Kejuaraan Pekan Olahraga Pelajar Daerah (POPDA Jabar)', 'deskripsi' => 'SMK Negeri 4 Bogor Mengucapkan Selamat dan Sukses Kepada Naila Syahrani dari Tim Gulat atas Peraihan Prestasi yang telah di Raih', 'tanggal_publikasi' => '2025-09-28'],
            ['gambar' => 'artikel11.jpeg', 'kategori' => 'Pengumuman', 'judul' => 'Kegiatan Briefing Mingguan', 'deskripsi' => 'Kegiatan briefing mingguan yang dipimpin oleh kepala sekolah untuk menyampaikan arahan, evaluasi, dan informasi kepada seluruh guru.', 'tanggal_publikasi' => '2025-03-17'],
            ['gambar' => 'artikel12.webp', 'kategori' => 'Lingkungan', 'judul' => 'KR4BAT BEBERSIH', 'deskripsi' => 'Kegiatan KR4BAT BEBERSIH Kebersihan dan Pelestarian Lingkungan. Kegiatan ini dilaksanakan di SMKN 4 Bogor.', 'tanggal_publikasi' => '2026-04-08'],
            ['gambar' => 'artikel13.webp', 'kategori' => 'Ekstrakurikuler', 'judul' => 'Selamat dan Sukses', 'deskripsi' => 'Kegiatan Penyerahan Penghargaan kepada Tim futsal putra yang telah meraih juara 2 dalam lomba Championship Turnamen Bergensi Sepak bola', 'tanggal_publikasi' => '2025-11-24'],
            ['gambar' => 'artikel14.webp', 'kategori' => 'Edukasi', 'judul' => 'Kegiatan Sosialisasi Pencegahan HIV / AIDS.', 'deskripsi' => 'Kegiatan ini dilaksanakan di aula SMKN 4 Bogor.', 'tanggal_publikasi' => '2025-11-10'],
        ];

        foreach ($artikels as $item) {
            Artikel::create($item);
        }
    }
}