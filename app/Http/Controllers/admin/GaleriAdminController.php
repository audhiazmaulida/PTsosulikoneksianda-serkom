<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GaleriAdminController extends Controller
{
        private array $kategoriOptions = ['Kegiatan', 'Kantor', 'Proyek'];

    /**
     * Tampilkan daftar galeri + fitur cari kategori.
     */
    public function index(Request $request): View
    {
        $cari = $request->query('cari');

        $galeris = Galeri::when($cari, function ($query, $cari) {
                $query->where('kategori', 'like', "%{$cari}%");
            })
            ->orderByDesc('tanggal')
            ->get();

        return view('admin.galeri.index', compact('galeris', 'cari'));
    }

    /**
     * Tampilkan form tambah dokumentasi baru.
     */
    public function create(): View
    {
        return view('admin.galeri.create', ['kategoriOptions' => $this->kategoriOptions]);
    }

    /**
     * Simpan galeri baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'foto' => 'required|image|max:5120', // maksimal 5MB
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['foto'] = $request->file('foto')->store('galeri', 'public');

        Galeri::create($validated);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(Galeri $galeri): View
    {
        return view('admin.galeri.edit', [
            'galeri' => $galeri,
            'kategoriOptions' => $this->kategoriOptions,
        ]);
    }

    /**
     * Update galeri yang sudah ada.
     */
    public function update(Request $request, Galeri $galeri): RedirectResponse
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|max:5120',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if (Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $validated['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($validated);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    /**
     * Hapus galeri.
     */
    public function destroy(Galeri $galeri): RedirectResponse
    {
        if (Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Dokumentasi berhasil dihapus.');
    }
}