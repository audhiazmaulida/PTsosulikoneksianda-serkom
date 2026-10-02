<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman Profile Sekolah.
     */
    public function index(): View
    {
        $sejarah = [
            'foto' => asset('images/lap2.JPG'),
            'paragraf_1' => 'SMK Negeri 4 Bogor dirintis pada tahun 2008 dan resmi dibuka pada tahun 2009 di bawah naungan pemerintah Kota Bogor, Jawa Barat. Sekolah kejuruan ini berfokus pada bidang teknologi, rekayasa, serta teknologi informasi dan komunikasi.',
            'paragraf_2' => 'Sejak awal pembentukannya, institusi ini telah menjadi pilar keunggulan akademik di wilayah ini, memupuk semangat belajar yang tak kenal lelah dan integritas moral yang tinggi.',
        ];

        $visi = 'Mewujudkan generasi unggul, berkarakter, dan kompeten di bidang teknologi dan kejuruan, serta siap kerja, santun, mandiri, dan kreatif.';

        $misi = [
            ['judul' => 'Unggul & Kompeten', 'deskripsi' => 'Mengembangkan kemampuan siswa dalam bidang teknologi dan kejuruan sesuai kebutuhan zaman.'],
            ['judul' => 'Berkarakter & Santun', 'deskripsi' => 'Membentuk peserta didik yang bermoral baik, sopan, dan berintegritas tinggi.'],
            ['judul' => 'Siap Kerja & Mandiri', 'deskripsi' => 'Membekali siswa dengan keterampilan vokasi agar siap menghadapi dunia kerja atau berwirausaha secara mandiri, sekaligus mengembangkan potensi siswa secara optimal.'],
            ['judul' => 'Kreatif', 'deskripsi' => 'Mendorong inovasi dan daya cipta dalam memecahkan masalah di bidang keahlian masing-masing.'],
        ];

        $sambutan = [
            'foto' => asset('images/kepalasekola.jpeg'),
            'kutipan' => 'Selamat datang di Website Resmi SMK Negeri 4 Bogor. Semoga website ini menjadi sumber informasi yang bermanfaat serta mempererat komunikasi antara sekolah, peserta didik, orang tua, alumni, dan masyarakat. Mari bersama mewujudkan pendidikan yang unggul, berkarakter, dan berprestasi.',
            'nama' => 'Drs. Mulya Murprihartono, M.Si.',
            'jabatan' => 'Kepala SMK Negeri 4 Bogor',
        ];

        $struktur = [
            'kepala' => ['jabatan' => 'Kepala Sekolah', 'nama' => 'Drs. Budi Santoso, M.Pd'],
            'wakil' => [
                ['jabatan' => 'Wakil Kurikulum', 'nama' => 'Hj. Siti Aminah, M.Pd'],
                ['jabatan' => 'Wakil Kesiswaan', 'nama' => 'Irwan Syah, S.Pd'],
                ['jabatan' => 'Wakil Sarana', 'nama' => 'Ahmad Dahlan, M.T'],
                ['jabatan' => 'Wakil Humas', 'nama' => 'Dian Pertiwi, S.Kom'],
            ],
        ];

        return view('pages.profile', compact('sejarah', 'visi', 'misi', 'sambutan', 'struktur'));
    }
}