<?php

namespace Database\Seeders;

use App\Models\ProfilPerusahaan;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        ProfilPerusahaan::updateOrCreate(
            ['id' => 1],
            [
                'sejarah' => "PT Solusi Koneksi Anda berdiri pada tahun 2018 di Kota Bogor, Jawa Barat, dengan tujuan membantu usaha kecil hingga menengah memanfaatkan teknologi informasi secara tepat guna. Berawal dari tim kecil yang melayani pembuatan website dan instalasi jaringan, kami terus berkembang menjadi mitra teknologi yang dipercaya banyak klien.\n"
                    . "Saat ini kami melayani pembuatan website, pengembangan aplikasi, instalasi jaringan, konsultasi IT, maintenance, dan pemasangan CCTV, dengan komitmen menghadirkan layanan yang andal, transparan, dan berorientasi pada kebutuhan pelanggan.",

                'visi' => 'Menjadi mitra teknologi informasi terpercaya yang menghubungkan bisnis dengan solusi digital yang andal, inovatif, dan berkelanjutan.',

                'misi' => "Menyediakan layanan teknologi informasi yang berkualitas dan sesuai kebutuhan klien.\n"
                    . "Mengembangkan tim yang profesional, kompeten, dan berintegritas.\n"
                    . "Menerapkan teknologi terkini untuk menjaga keamanan dan keandalan sistem klien.\n"
                    . "Memberikan dukungan purna jual yang cepat, ramah, dan responsif.",

                'sambutan' => 'Selamat datang di website resmi PT Solusi Koneksi Anda. Kami percaya teknologi yang tepat dapat mendorong bisnis tumbuh lebih cepat. Kepercayaan Anda adalah motivasi kami untuk terus memberikan layanan terbaik.',

                'nama_direktur' => 'Rizky Pratama, S.Kom., M.T.',
                'jabatan_direktur' => 'Direktur Utama PT Solusi Koneksi Anda',
            ]
        );
    }
}