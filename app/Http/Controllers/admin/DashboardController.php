<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman Dashboard admin.
     */
    public function index(): View
    {
        // TODO: ganti jadi hitungan asli setelah tiap konten (Artikel, Produk, dst)
        // sudah punya tabel & model sendiri, misal: Artikel::count()
         $stats = [
            ['label' => 'Jumlah Artikel', 'value' => 12, 'icon' => 'jumlahartikel.png', 'route' => 'admin.artikel.index'],
            ['label' => 'Jumlah Produk', 'value' => 8, 'icon' => 'jumlahproduk.png', 'route' => 'admin.produk.index'],
            ['label' => 'Jumlah Galeri', 'value' => 28, 'icon' => 'jumlahgaleri.png', 'route' => 'admin.galeri.index'],
            ['label' => 'Ekstrakurikuler', 'value' => 6, 'icon' => 'jumlahekskul.png', 'route' => 'admin.ekskul.index'],
        ];

        // TODO: ganti jadi query aktivitas asli (misal dari tabel activity_log)
        // setelah fitur CRUD-nya jadi.
        $aktivitas = [
            ['icon' => 'aktivitasterkini1.png', 'teks' => 'Admin mengubah Artikel "Upacara hari anak nasional"', 'waktu' => '2 jam yang lalu'],
            ['icon' => 'aktivitasterkini2.png', 'teks' => 'Foto baru diunggah ke Galeri Ekstrakurikuler', 'waktu' => '5 jam yang lalu'],
            ['icon' => 'aktivitasterkini3.png', 'teks' => 'Produk "Batik Sekolah" diperbarui stoknya', 'waktu' => 'Kemarin'],
        ];

        return view('admin.dashboard', compact('stats', 'aktivitas'));
    }
}