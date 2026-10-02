<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanKontak extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'subjek',
        'pesan',
        'sudah_dibaca',
        'balasan',
        'dibalas_pada',
        'lampiran',
    ];

    protected $casts = [
        'sudah_dibaca' => 'boolean',
        'dibalas_pada' => 'datetime',
    ];

    /**
     * Status pesan, dihitung otomatis dari kolom yang ada
     * (bukan disimpan manual, biar gak ada kondisi "nyasar"):
     * - Ada dibalas_pada  -> "Sudah Dibalas"
     * - sudah_dibaca true -> "Sudah Dibaca"
     * - selain itu        -> "Belum Dibaca"
     */
    public function getStatusAttribute(): string
    {
        if ($this->dibalas_pada) {
            return 'Sudah Dibalas';
        }

        return $this->sudah_dibaca ? 'Sudah Dibaca' : 'Belum Dibaca';
    }

    /**
     * Class warna badge buat status di atas.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'Sudah Dibalas' => 'bg-green-100 text-green-700',
            'Sudah Dibaca' => 'bg-blue-100 text-blue-700',
            default => 'bg-gold/20 text-gold-dark',
        };
    }
}