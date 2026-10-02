<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $fillable = [
        'foto',
        'nama',
        'kategori',
        'deskripsi',
    ];

    /**
     * URL foto — support foto lama (manual di public/images/)
     * dan foto baru (di-upload admin, disimpan di storage/app/public/ekskul/).
     */
    public function getFotoUrlAttribute(): string
    {
        if (! $this->foto) {
            return asset('images/ekskul-placeholder.png');
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