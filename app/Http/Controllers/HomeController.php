<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Produk;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman Home.
     */
    public function index(): View
    {
        // 4 kartu keunggulan (icon = nama file di public/images/home/)
                $features = [
            [
                'title' => 'Tim Profesional',
                'description' => 'Tenaga ahli bersertifikasi dan berpengalaman di bidang IT dan jaringan.',
                'accent' => 'navy',
                'icon' => 'orang.png',
                'icon_size' => 32,
            ],
            [
                'title' => 'Layanan Berkualitas',
                'description' => 'Solusi yang dirancang sesuai kebutuhan bisnis dengan standar kerja terukur.',
                'accent' => 'gold',
                'icon' => 'piagam.png',
                'icon_size' => 32,
            ],
            [
                'title' => 'Teknologi Modern',
                'description' => 'Menggunakan perangkat dan teknologi terkini agar sistem aman dan andal.',
                'accent' => 'navy',
                'icon' => 'icon.png',
                'icon_size' => 60,
            ],
            [
                'title' => 'Dukungan Responsif',
                'description' => 'Tim support siap membantu Anda kapan pun dibutuhkan.',
                'accent' => 'gold',
                'icon' => 'icon2.png',
                'icon_size' => 52,
            ],
        ];

        // Statistik perusahaan
        $stats = [
            ['icon' => 'orang2.png', 'value' => '150+', 'label' => 'Klien Terlayani'],
            ['icon' => 'piagam2.png', 'value' => '300+', 'label' => 'Proyek Selesai'],
            ['icon' => 'staff.png', 'value' => '25+', 'label' => 'Tim Profesional'],
            ['icon' => 'jurusan.png', 'value' => '8', 'label' => 'Tahun Pengalaman'],
        ];

        // Data dinamis dari database (diatur lewat halaman admin)
        $artikels = Artikel::orderByDesc('tanggal_publikasi')->take(2)->get();
        $layanans = Produk::latest()->take(4)->get();
        $galeris = Galeri::latest()->take(4)->get();

        return view('pages.home', compact('features', 'stats', 'artikels', 'layanans', 'galeris'));
    }
}