<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    
    private function badgeClass(string $kategori): string
    {
        return match ($kategori) {
            'Kegiatan'        => 'bg-slate-200 text-slate-700',
            'Prestasi'        => 'bg-gold/20 text-gold-dark',
            'Pengumuman'      => 'bg-gray-200 text-gray-600',
            'Lingkungan'      => 'bg-green-100 text-green-700',
            'Ekstrakurikuler' => 'bg-blue-100 text-blue-700',
            'Edukasi'         => 'bg-purple-100 text-purple-700',
            default           => 'bg-gray-200 text-gray-600',
        };
    }

    /**
     * Tampilkan halaman Artikel & Berita — sekarang beneran dari database.
     */
    public function index(): View
    {
        $artikels = Artikel::orderByDesc('tanggal_publikasi')
            ->get()
            ->map(function (Artikel $artikel) {
                return [
                    'thumbnail' => $artikel->gambar_url,
                    'kategori' => $artikel->kategori,
                    'judul' => $artikel->judul,
                    'ringkasan' => $artikel->deskripsi,
                    'tanggal' => $artikel->tanggal_publikasi->translatedFormat('d F Y'),
                    'badge_class' => $this->badgeClass($artikel->kategori),
                ];
            });

        return view('pages.artikel', compact('artikels'));
    }
}