<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $table = 'profil_perusahaans';

    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'sambutan',
        'nama_direktur',
        'jabatan_direktur',
        'foto_tentang',
        'foto_direktur',
    ];

    /** Sejarah dipecah per baris -> tiap baris jadi satu paragraf */
    public function getSejarahParagrafAttribute(): array
    {
        return $this->pisahBaris($this->sejarah);
    }

    /** Misi dipecah per baris -> tiap baris jadi satu poin */
    public function getMisiListAttribute(): array
    {
        return $this->pisahBaris($this->misi);
    }

    public function getFotoTentangUrlAttribute(): string
    {
        return $this->urlFoto($this->foto_tentang, 'images/tentang.jpg');
    }

    public function getFotoDirekturUrlAttribute(): string
    {
        return $this->urlFoto($this->foto_direktur, 'images/direktur.jpg');
    }

    private function pisahBaris(?string $teks): array
    {
        $baris = preg_split('/\R/', (string) $teks);

        return array_values(array_filter(array_map('trim', $baris)));
    }

    /**
     * Kalau belum ada foto upload, pakai gambar bawaan di public/images/.
     * Kalau sudah di-upload admin, ambil dari storage (/storage/profil/...).
     */
    private function urlFoto(?string $foto, string $default): string
    {
        if (! $foto) {
            return asset($default);
        }

        if (str_starts_with($foto, 'http')) {
            return $foto;
        }

        return asset('storage/' . $foto);
    }
}