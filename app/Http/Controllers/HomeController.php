<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman Home / Beranda.
     */
    public function index(): View
    {
        // 4 kartu keunggulan yang overlap di atas hero
        // 'icon' di sini cuma NAMA FILE-nya doang (bukan path lengkap),
        // soalnya foldernya (images/home/) sudah ditentukan di blade.
        $features = [
            [
                'title' => 'Guru Profesional',
                'description' => 'Tenaga pendidik berkompeten dan berpengalaman dibidangnya.',
                'accent' => 'navy',
                'icon' => 'orang.png',
            ],
            [
                'title' => 'Prestasi Sekolah',
                'description' => 'Ragam prestasi tingkat kota, daerah hingga nasional berkelanjutan.',
                'accent' => 'gold',
                'icon' => 'piagam.png',
            ],
            [
                'title' => 'Fasilitas Modern',
                'description' => 'Fasilitas lengkap untuk mendukung pembelajaran siswa/i.',
                'accent' => 'navy',
                'icon' => 'gedung.png',
            ],
            [
                'title' => 'Lingkungan Nyaman',
                'description' => 'Lingkungan sekolah yang aman, bersih dan asri untuk siswa.',
                'accent' => 'gold',
                'icon' => 'pohon.png',
            ],
        ];

        $stats = [
            ['icon' => 'orang2.png', 'value' => '1000+', 'label' => 'Siswa Aktif'],
            ['icon' => 'staff.png', 'value' => '40+', 'label' => 'Guru & Staff'],
            ['icon' => 'piagam2.png', 'value' => '50+', 'label' => 'Prestasi Utama'],
            ['icon' => 'jurusan.png', 'value' => '4', 'label' => 'Jurusan'],
        ];

        // Artikel terbaru — pakai artikel1.webp & artikel2.jpg
        $artikels = [
            [
                'thumbnail' => asset('images/artikel1.webp'),
                'tanggal' => '2 April 2026',
                'judul' => 'Selamat untuk siswa-siswi SMKN 4 Bogor yang berhasil lolos SNBP 2026! 🎓✨',
                'ringkasan' => 'Siswa-siswi SMK Negeri 4 Bogor berhasil lolos mengikuti SNBP 2026!',
                'kategori' => 'Prestasi',
            ],
            [
                'thumbnail' => asset('images/artikel2.jpg'),
                'tanggal' => '27 April 2026',
                'judul' => 'Kegiatan Uji Coba Pembatasan Hanphone',
                'ringkasan' => 'Kegiatan Uji Coba Pembatasan Hanphone yang dilaksanakan di SMK Negeri 4 Bogor pada Senin, 27 April 2026',
                'kategori' => 'Kegiatan',
            ],
        ];

        // Program keahlian / jurusan
        $jurusans = [
            ['logo' => asset('images/logotp.png'), 'nama' => 'TPFL', 'deskripsi' => 'Teknik pengelasan fabrikasi logam.'],
            ['logo' => asset('images/logoto.png'), 'nama' => 'TKRO', 'deskripsi' => 'Teknik kendaraan ringan otomotif.'],
            ['logo' => asset('images/logotkjt.png'), 'nama' => 'TJKT', 'deskripsi' => 'Teknik jaringan komputer, dan telekomunikasi.'],
            ['logo' => asset('images/logopplg.png'), 'nama' => 'PPLG', 'deskripsi' => 'Pengembangan perangkat lunak, dan gim.'],
        ];

        // Galeri terbaru
        $galeris = [
            ['gambar' => asset('images/galeri/galeri1.webp'), 'judul' => 'Kegiatan 1'],
            ['gambar' => asset('images/galeri/galeri2.webp'), 'judul' => 'Kegiatan 2'],
            ['gambar' => asset('images/galeri/galeri3.jpg'), 'judul' => 'Kegiatan 3'],
            ['gambar' => asset('images/galeri/galeri4.webp'), 'judul' => 'Kegiatan 4', 'is_collage' => true],
        ];

        // Ekstrakulikuler
        $ekskuls = [
            ['logo' => asset('images/ekspramuka.jpg'), 'nama' => 'PRAMUKA', 'deskripsi' => 'Kegiatan yang melatih kedisiplinan, kemandirian, kepemimpinan, serta kemampuan bekerja sama.'],
            ['logo' => asset('images/ekspaskib.jpg'), 'nama' => 'PASKIBRA', 'deskripsi' => 'Kegiatan yang melatih kedisiplinan, kepemimpinan, ketangguhan, serta rasa tanggung jawab siswa.'],
            ['logo' => asset('images/eksbasket.jpeg'), 'nama' => 'BASKET', 'deskripsi' => 'Mengembangkan kemampuan bermain basket, kekompakan tim, dan semangat sportivitas.'],
            ['logo' => asset('images/eksfutsal.jpeg'), 'nama' => 'FUTSAL', 'deskripsi' => 'Kegiatan olahraga yang melatih keterampilan bermain futsal, kerja sama tim, dan menjaga kebugaran.'],
            ['logo' => asset('images/ekspmr.jpg'), 'nama' => 'PMR', 'deskripsi' => 'Kegiatan melatih keterampilan pertolongan pertama, pengetahuan kesehatan, kepedulian terhadap sesama.'],
            ['logo' => asset('images/eksrohis.jpg'), 'nama' => 'ROHIS', 'deskripsi' => 'Kegiatan memperdalam pengetahuan agama, meningkatkan keimanan, dan mempererat kebersamaan.'],
        ];

        return view('pages.home', compact(
            'features', 'stats', 'artikels', 'jurusans', 'galeris', 'ekskuls'
        ));
    }
}