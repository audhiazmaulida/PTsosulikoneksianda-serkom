<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * 6 artikel contoh (tanpa gambar).
     * Gambar diunggah lewat halaman admin: Artikel > Edit.
     * Selama belum ada gambar, website memakai artikel-placeholder.png.
     */
    public function run(): void
    {
        $artikels = [
            [
                'kategori' => 'Teknologi',
                'judul' => 'Tren Website Bisnis 2026: Cepat, Aman, dan Ramah Seluler',
                'deskripsi' => 'Pengunjung kini lebih banyak mengakses website lewat ponsel. Website yang cepat dimuat, memakai HTTPS, dan tampil rapi di layar kecil terbukti meningkatkan kepercayaan dan peluang konversi pelanggan.',
                'tanggal_publikasi' => '2026-10-05',
            ],
            [
                'kategori' => 'Tips',
                'judul' => '5 Tips Menjaga Keamanan Jaringan Kantor Anda',
                'deskripsi' => 'Mulai dari mengganti kata sandi bawaan router, memisahkan jaringan tamu, memperbarui firmware, hingga membuat cadangan data rutin. Langkah sederhana ini sangat mengurangi risiko gangguan dan kebocoran data.',
                'tanggal_publikasi' => '2026-09-22',
            ],
            [
                'kategori' => 'Kegiatan',
                'judul' => 'Workshop Transformasi Digital untuk UMKM Kota Bogor',
                'deskripsi' => 'PT Solusi Koneksi Anda menggelar workshop bagi pelaku UMKM untuk memperkenalkan pemanfaatan website, katalog digital, dan pemasaran online agar usaha lebih mudah ditemukan pelanggan.',
                'tanggal_publikasi' => '2026-09-10',
            ],
            [
                'kategori' => 'Proyek',
                'judul' => 'Instalasi Jaringan Kantor Cabang Klien Selesai Tepat Waktu',
                'deskripsi' => 'Tim kami menuntaskan pemasangan jaringan LAN dan WiFi untuk kantor cabang klien dalam waktu tiga hari kerja, lengkap dengan pengujian kecepatan dan pelatihan singkat bagi staf.',
                'tanggal_publikasi' => '2026-08-28',
            ],
            [
                'kategori' => 'Pengumuman',
                'judul' => 'Jam Layanan Dukungan Teknis Kini Lebih Panjang',
                'deskripsi' => 'Mulai bulan ini, tim dukungan teknis melayani pelanggan lebih lama setiap hari kerja. Hubungi kami melalui halaman Kontak untuk bantuan dengan website, jaringan, maupun perangkat kantor Anda.',
                'tanggal_publikasi' => '2026-08-15',
            ],
            [
                'kategori' => 'Edukasi',
                'judul' => 'Mengenal Perbedaan Website Statis dan Website Dinamis',
                'deskripsi' => 'Website statis menampilkan isi yang tetap, sedangkan website dinamis memiliki halaman admin sehingga konten seperti artikel, produk, dan galeri bisa ditambah, diubah, dan dihapus kapan saja tanpa menyentuh kode.',
                'tanggal_publikasi' => '2026-07-30',
            ],
        ];

        foreach ($artikels as $item) {
            Artikel::updateOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
    }
}