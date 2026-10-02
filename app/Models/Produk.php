<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * Nama tabel eksplisit "produk" (bukan "produks"),
     * karena "produk" tetap sama baik tunggal maupun jamak.
     */
    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'slug',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
        'foto',
    ];

    protected $casts = [
        'harga' => 'integer',
    ];

    /**
     * Accessor: $produk->formatted_harga -> "Rp 70.000"
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Accessor: $produk->gambar -> URL lengkap foto.
     *
     * Diperbaiki supaya support 2 sumber foto:
     * 1. Foto LAMA (dari seeder) — filenya ada manual di public/images/
     * 2. Foto BARU (di-upload admin lewat form) — disimpan Laravel
     *    di storage/app/public/produk/, diakses lewat /storage/...
     */
    public function getGambarAttribute(): ?string
    {
        if (! $this->foto) {
            return null;
        }

        if (str_starts_with($this->foto, 'http')) {
            return $this->foto;
        }

        if (file_exists(public_path('images/' . $this->foto))) {
            return asset('images/' . $this->foto);
        }

        return asset('storage/' . $this->foto);
    }
}