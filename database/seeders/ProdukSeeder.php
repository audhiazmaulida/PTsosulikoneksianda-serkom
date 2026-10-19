<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * 6 layanan PT Solusi Koneksi Anda (tanpa foto).
     * Foto diunggah lewat halaman admin: Produk / Layanan > Edit.
     * 'harga' null = tampil "Hubungi kami" di website.
     */
    public function run(): void
    {
        $layanans = [
            [
                'kategori' => 'Website',
                'nama' => 'Pembuatan Website',
                'harga' => 2500000,
                'deskripsi' => 'Pembuatan website company profile, toko online, dan sistem informasi yang responsif, cepat, dan mudah dikelola sesuai identitas bisnis Anda.',
            ],
            [
                'kategori' => 'Aplikasi',
                'nama' => 'Pengembangan Aplikasi',
                'harga' => null,
                'deskripsi' => 'Pengembangan aplikasi web dan mobile khusus untuk kebutuhan operasional perusahaan, dari analisis kebutuhan hingga implementasi dan pelatihan pengguna.',
            ],
            [
                'kategori' => 'Jaringan',
                'nama' => 'Instalasi Jaringan',
                'harga' => 1500000,
                'deskripsi' => 'Perancangan dan pemasangan jaringan LAN, WiFi, dan server kantor yang stabil, aman, dan siap dikembangkan seiring pertumbuhan bisnis.',
            ],
            [
                'kategori' => 'Konsultasi',
                'nama' => 'Konsultasi IT',
                'harga' => 500000,
                'deskripsi' => 'Pendampingan strategi teknologi informasi: pemilihan perangkat, perencanaan infrastruktur, dan transformasi digital yang sesuai anggaran.',
            ],
            [
                'kategori' => 'Maintenance',
                'nama' => 'Maintenance & Support',
                'harga' => 750000,
                'deskripsi' => 'Perawatan berkala dan dukungan teknis untuk website, jaringan, dan perangkat kantor agar operasional bisnis berjalan tanpa gangguan.',
            ],
            [
                'kategori' => 'Keamanan',
                'nama' => 'Pemasangan CCTV',
                'harga' => 1800000,
                'deskripsi' => 'Survei lokasi, pemasangan kamera CCTV, dan pengaturan akses pantau jarak jauh lewat ponsel untuk menjaga keamanan kantor dan properti.',
            ],
        ];

        foreach ($layanans as $item) {
            Produk::updateOrCreate(
                ['slug' => Str::slug($item['nama'])],
                $item
            );
        }
    }
}