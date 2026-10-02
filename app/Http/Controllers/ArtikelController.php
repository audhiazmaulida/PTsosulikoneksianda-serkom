<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    /**
     * Daftar nama file foto lama yang isinya kolase (2 foto digabung jadi 1 file,
     * ada garis putih di tengah) — peninggalan desain awal sebelum CRUD dinamis.
     * Kalau ada foto baru yang di-upload lewat form Tambah Artikel, otomatis
     * TIDAK masuk daftar ini, jadi tetap tampil normal (tidak di-crop/zoom).
     */
    private const FOTO_KOLASE = [
        'artikel5.webp',
        'artikel6.jpg',
        'artikel7.webp',
        'artikel9.webp',
        'artikel11.jpeg',
        'artikel12.webp',
        'artikel13.webp',
        'artikel14.webp',
    ];

    private function isFotoKolase(?string $urlFoto): bool
    {
        if (! $urlFoto) {
            return false;
        }

        $namaFile = basename($urlFoto);

        return in_array($namaFile, self::FOTO_KOLASE, true);
    }

    /**
     * Warna badge per kategori. Class Tailwind di sini ditulis LENGKAP
     * (bukan digabung dinamis kayak "bg-{{ $x }}-100") supaya Tailwind v4
     * bisa mendeteksinya otomatis dari teks file ini saat build.
     */
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
     * Tampilkan halaman Artikel & Berita, narik data asli dari database.
     */
    public function index(): View
    {
        $artikels = Artikel::query()
            ->orderByDesc('tanggal_publikasi')
            ->get()
            ->map(function (Artikel $artikel) {
                return [
                    'thumbnail'   => $artikel->gambar_url,
                    'kategori'    => $artikel->kategori,
                    'judul'       => $artikel->judul,
                    'ringkasan'   => $artikel->deskripsi,
                    'tanggal'     => optional($artikel->tanggal_publikasi)->translatedFormat('d F Y'),
                    'badge_class' => $this->badgeClass($artikel->kategori),
                    'is_collage'  => $this->isFotoKolase($artikel->gambar_url),
                ];
            });

        return view('pages.artikel', compact('artikels'));
    }
}