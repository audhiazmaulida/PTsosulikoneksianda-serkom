<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'gambar',
        'judul',
        'kategori',
        'deskripsi',
        'tanggal_publikasi',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];

    /**
     * URL gambar yang siap dipakai di <img src="...">.
     *
     * Kenapa perlu accessor ini? Karena kita punya 2 jenis sumber gambar:
     * 1. Artikel LAMA (dari seeder) — filenya udah ada manual di public/images/
     * 2. Artikel BARU (di-upload admin lewat form) — filenya disimpan Laravel
     *    di storage/app/public/artikel/, diakses lewat /storage/...
     *
     * Accessor ini otomatis milih cara yang benar tergantung sumbernya,
     * jadi di Blade kita tinggal panggil $artikel->gambar_url tanpa perlu mikirin itu.
     */
    public function getGambarUrlAttribute(): string
    {
        if (! $this->gambar) {
            return asset('images/artikel-placeholder.png');
        }

        if (str_starts_with($this->gambar, 'http')) {
            return $this->gambar;
        }

        if (file_exists(public_path('images/' . $this->gambar))) {
            return asset('images/' . $this->gambar);
        }

        return asset('storage/' . $this->gambar);
    }
}