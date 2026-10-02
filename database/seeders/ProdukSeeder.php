<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Pindahin 8 produk yang tadinya hardcode di ProdukController
     * ke database, biar kontennya gak ilang pas kita ganti sistem.
     * Jalankan sekali: php artisan db:seed --class=ProdukSeeder
     */
    public function run(): void
    {
        $produks = [
            ['foto' => 'atribut.jpeg', 'kategori' => 'Aksesoris', 'nama' => 'Atribut', 'harga' => 70000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bet.jpeg', 'kategori' => 'Aksesoris', 'nama' => 'Bet Seragam', 'harga' => 30000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bajutp.png', 'kategori' => 'Seragam', 'nama' => 'Warepack TPFL', 'harga' => 450000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bajupplg.png', 'kategori' => 'Seragam', 'nama' => 'Warepack PPLG', 'harga' => 250000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bajutjkt.png', 'kategori' => 'Seragam', 'nama' => 'Warepack TJKT', 'harga' => 250000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bajuto.png', 'kategori' => 'Seragam', 'nama' => 'Warepack TKRO', 'harga' => 450000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bajubatik.png', 'kategori' => 'Seragam', 'nama' => 'Batik Sekolah Identitas', 'harga' => 150000, 'stok' => 'Stok tersedia'],
            ['foto' => 'bajumuslim.png', 'kategori' => 'Seragam', 'nama' => 'Muslim Sekolah Identitas', 'harga' => 150000, 'stok' => 'Stok tersedia'],
        ];

        foreach ($produks as $item) {
            $item['slug'] = Str::slug($item['nama']);
            $item['deskripsi'] = null;
            Produk::create($item);
        }
    }
}