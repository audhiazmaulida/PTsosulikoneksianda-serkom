<?php

namespace Database\Seeders;

use App\Models\Ekskul;
use Illuminate\Database\Seeder;

class EkskulSeeder extends Seeder
{
    public function run(): void
    {
        $ekskuls = [
            ['foto' => 'pramuka.JPG', 'kategori' => 'Kepemimpinan', 'nama' => 'Pramuka', 'deskripsi' => 'Membentuk karakter disiplin, mandiri, dan cinta alam melalui kegiatan kepanduan yang berintegritas tinggi.'],
            ['foto' => 'paskib.jpeg', 'kategori' => 'Kepemimpinan', 'nama' => 'Paskibra', 'deskripsi' => 'Melatih kepemimpinan, kedisiplinan, dan ketangkasan dalam baris-berbaris untuk upacara kenegaraan.'],
            ['foto' => 'basket.JPG', 'kategori' => 'Olahraga', 'nama' => 'Basket', 'deskripsi' => 'Mengembangkan bakat olahraga bola basket dengan teknik profesional dan semangat sportivitas tim.'],
            ['foto' => 'futsal.JPG', 'kategori' => 'Olahraga', 'nama' => 'Futsal', 'deskripsi' => 'Menyalurkan hobi olahraga futsal dan membangun kerjasama tim yang solid serta teknik mumpuni.'],
            ['foto' => 'pmr.jpeg', 'kategori' => 'Kemanusiaan', 'nama' => 'PMR', 'deskripsi' => 'Membentuk kepedulian dan keterampilan pertolongan pertama demi menolong sesama anggota masyarakat.'],
            ['foto' => 'rohis.JPG', 'kategori' => 'Keagamaan', 'nama' => 'Rohis', 'deskripsi' => 'Wadah bagi siswa untuk memperdalam ilmu agama Islam, membangun akhlak mulia, serta mengembangkan kepemimpinan melalui berbagai kegiatan keagamaan.'],
        ];

        foreach ($ekskuls as $item) {
            Ekskul::create($item);
        }
    }
}