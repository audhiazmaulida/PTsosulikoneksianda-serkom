<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'foto',
        'kategori',
        'deskripsi',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getFotoUrlAttribute(): string
    {
        if (str_starts_with($this->foto, 'http')) {
            return $this->foto;
        }

        if (file_exists(public_path('images/galeri/' . $this->foto))) {
            return asset('images/galeri/' . $this->foto);
        }

        if (file_exists(public_path('images/' . $this->foto))) {
            return asset('images/' . $this->foto);
        }

        return asset('storage/' . $this->foto);
    }
}