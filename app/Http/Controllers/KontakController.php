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
            'alamat' => 'Jl. Raya Pajajaran No. 90, Kota Bogor, Jawa Barat 16153',
            'telepon' => '(0251) 8123456',
            'email' => 'info@solusikoneksianda.co.id',
            'jam_operasional' => [
                ['hari' => 'Senin - Jumat', 'jam' => '08:00 - 17:00', 'tutup' => false],
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
            ->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda kembali.');
    }
}