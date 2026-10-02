<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KontakAdminController extends Controller
{
    /**
     * Tampilkan daftar pesan masuk.
     */
    public function index(): View
    {
        $pesans = PesanKontak::latest()->get();

        return view('admin.kontak.index', compact('pesans'));
    }

    /**
     * Tampilkan detail 1 pesan + form balasan.
     * Begitu admin buka halaman ini, otomatis ditandai "sudah dibaca"
     * (kalau belum ada balasan) — logikanya: kalau udah dibuka, ya udah dibaca.
     */
    public function show(PesanKontak $kontak): View
    {
        if (! $kontak->sudah_dibaca) {
            $kontak->update(['sudah_dibaca' => true]);
        }

        return view('admin.kontak.show', ['kontak' => $kontak]);
    }

    /**
     * Simpan balasan (cuma dicatat di database, TIDAK mengirim email asli).
     */
    public function balas(Request $request, PesanKontak $kontak): RedirectResponse
    {
        $validated = $request->validate([
            'balasan' => 'required|string',
            'lampiran' => 'nullable|file|max:5120',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran-balasan', 'public');
        }

        $validated['sudah_dibaca'] = true;
        $validated['dibalas_pada'] = now();

        $kontak->update($validated);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Balasan berhasil disimpan dan status pesan diperbarui jadi "Sudah Dibalas".');
    }

    /**
     * Tandai pesan sudah dibaca TANPA membalas (tombol "Tandai Terbaca Saja").
     */
    public function tandaiDibaca(PesanKontak $kontak): RedirectResponse
    {
        $kontak->update(['sudah_dibaca' => true]);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan ditandai sudah dibaca.');
    }

// hapus pesan 
    public function destroy(PesanKontak $kontak): RedirectResponse
    {
        if ($kontak->lampiran && Storage::disk('public')->exists($kontak->lampiran)) {
            Storage::disk('public')->delete($kontak->lampiran);
        }

        $kontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}