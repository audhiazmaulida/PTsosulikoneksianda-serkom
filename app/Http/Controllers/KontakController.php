<?php

namespace App\Http\Controllers;

use App\Models\PesanKontak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KontakController extends Controller
{
    /**
     * Tampilkan halaman Kontak.
     */
    public function index(): View
    {
        $infoKontak = [
            'alamat' => 'Jl. Raya Tajur, Kp. Buntar RT.02/RW.08 Kec. Bogor Selatan, Kota Bogor, Jawa Barat',
            'telepon' => '(0251) 7547381',
            'email' => 'smkn4@smkn4bogor.sch.id',
            'jam_operasional' => [
                ['hari' => 'Senin - Jumat', 'jam' => '06:30 - 17:00', 'tutup' => false],
                ['hari' => 'Sabtu - Minggu', 'jam' => 'Tutup', 'tutup' => true],
            ],
        ];

        return view('pages.kontak', compact('infoKontak'));
    }

    /**
     * Simpan pesan yang dikirim dari form Kontak ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi dulu sebelum disimpan — kalau ada yang gagal,
        // Laravel otomatis redirect balik ke form + isi pesan error-nya
        // (bisa ditampilin di blade pakai @error dan old()).
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:2000',
        ]);

        PesanKontak::create($validated);

        // 'with' ngirim data sekali-pakai (flash data) ke session,
        // cuma bisa dibaca di request BERIKUTNYA doang (pas redirect ini).
        return redirect()
            ->route('kontak')
            ->with('success', 'Pesan kamu berhasil dikirim! Kami akan segera menghubungi kamu kembali.');
    }
}