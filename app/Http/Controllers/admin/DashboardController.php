<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\PesanKontak;
use App\Models\Produk;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            ['label' => 'Jumlah Layanan', 'value' => Produk::count(), 'icon' => 'jumlahproduk.png', 'route' => 'admin.produk.index'],
            ['label' => 'Jumlah Artikel', 'value' => Artikel::count(), 'icon' => 'jumlahartikel.png', 'route' => 'admin.artikel.index'],
            ['label' => 'Jumlah Galeri', 'value' => Galeri::count(), 'icon' => 'jumlahgaleri.png', 'route' => 'admin.galeri.index'],
            ['label' => 'Pesan Masuk', 'value' => PesanKontak::count(), 'icon' => 'kontak.png', 'route' => 'admin.kontak.index'],
        ];

        return view('admin.dashboard', compact('stats'));
    }
}