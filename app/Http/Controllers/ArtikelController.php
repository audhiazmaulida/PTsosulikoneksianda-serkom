<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    /**
     * Warna badge per kategori. Class Tailwind ditulis LENGKAP (tidak digabung dinamis)
     * supaya Tailwind bisa mendeteksinya saat build.
     */
    private function badgeClass(string $kategori): string
    {
        return match ($kategori) {
            'Kegiatan'    => 'bg-slate-200 text-slate-700',
            'Teknologi'   => 'bg-blue-100 text-blue-700',
            'Pengumuman'  => 'bg-gray-200 text-gray-600',
            'Tips'        => 'bg-green-100 text-green-700',
            'Proyek'      => 'bg-gold/20 text-gold-dark',
            'Edukasi'     => 'bg-purple-100 text-purple-700',
            default       => 'bg-gray-200 text-gray-600',
        };
    }

    /**
     * Halaman daftar Artikel / Informasi Terkini, data asli dari database.
     */
    public function index(): View
    {
        $artikels = Artikel::query()
            ->orderByDesc('tanggal_publikasi')
            ->get()
            ->map(function (Artikel $artikel) {
                return [
                    'id'          => $artikel->id,
                    'thumbnail'   => $artikel->gambar_url,
                    'kategori'    => $artikel->kategori,
                    'judul'       => $artikel->judul,
                    'ringkasan'   => $artikel->deskripsi,
                    'tanggal'     => optional($artikel->tanggal_publikasi)->locale('id')->translatedFormat('d F Y'),
                    'badge_class' => $this->badgeClass($artikel->kategori),
                ];
            });

        return view('pages.artikel', compact('artikels'));
    }

    /**
     * Halaman detail satu artikel (/artikel/{id}).
     * Laravel otomatis mencari Artikel berdasarkan id di URL; kalau tidak ada -> halaman 404.
     */
    public function show(Artikel $artikel): View
    {
        // Isi artikel dipecah per baris -> tiap baris jadi satu paragraf
        $paragraf = array_values(array_filter(
            array_map('trim', preg_split('/\R/', (string) $artikel->deskripsi))
        ));

        // 3 artikel terbaru lainnya untuk bagian "Artikel Lainnya"
        $lainnya = Artikel::query()
            ->where('id', '!=', $artikel->id)
            ->orderByDesc('tanggal_publikasi')
            ->take(3)
            ->get();

        $badgeClass = $this->badgeClass($artikel->kategori);

        return view('pages.artikel-show', compact('artikel', 'paragraf', 'lainnya', 'badgeClass'));
    }
}