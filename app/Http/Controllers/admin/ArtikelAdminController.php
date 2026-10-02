<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArtikelAdminController extends Controller
{
    /**
     * Kategori yang tersedia di dropdown form (dipakai create & edit).
     */
    private array $kategoriOptions = [
        'Kegiatan', 'Prestasi', 'Pengumuman', 'Lingkungan', 'Ekstrakurikuler', 'Edukasi',
    ];

    /**
     * Tampilkan daftar artikel + fitur cari (?cari=...).
     */
    public function index(Request $request): View
    {
        $cari = $request->query('cari');

        $artikels = Artikel::when($cari, function ($query, $cari) {
                // 'like' %kata% = cari kata itu di mana aja dalam judul, gak harus persis
                $query->where('judul', 'like', "%{$cari}%");
            })
            ->orderByDesc('tanggal_publikasi')
            ->get();

        return view('admin.artikel.index', compact('artikels', 'cari'));
    }

    /**
     * Tampilkan form tambah artikel baru.
     */
    public function create(): View
    {
        return view('admin.artikel.create', ['kategoriOptions' => $this->kategoriOptions]);
    }

    /**
     * Simpan artikel baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|max:2048', // maksimal 2MB
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        // Kalau ada file yang di-upload, simpan ke storage/app/public/artikel/
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($validated);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit, terisi data yang sudah ada.
     */
    public function edit(Artikel $artikel): View
    {
        return view('admin.artikel.edit', [
            'artikel' => $artikel,
            'kategoriOptions' => $this->kategoriOptions,
        ]);
    }

    /**
     * Update artikel yang sudah ada.
     */
    public function update(Request $request, Artikel $artikel): RedirectResponse
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|max:2048',
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tanggal_publikasi' => 'required|date',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus foto lama dulu (kalau itu file upload, bukan foto lama dari public/images)
            if ($artikel->gambar && ! str_starts_with($artikel->gambar, 'http') && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($validated);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel.
     */
    public function destroy(Artikel $artikel): RedirectResponse
    {
        if ($artikel->gambar && ! str_starts_with($artikel->gambar, 'http') && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}