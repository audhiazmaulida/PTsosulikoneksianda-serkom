<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EkskulAdminController extends Controller
{
    private array $kategoriOptions = ['Kepemimpinan', 'Olahraga', 'Kemanusiaan', 'Keagamaan'];

    /**
     * Tampilkan daftar ekstrakurikuler + kartu statistik.
     */
    public function index(): View
    {
        $ekskuls = Ekskul::orderBy('nama')->get();

        // TODO: 3 angka ini masih statis (kayak Dashboard) karena belum ada
        // data pendukungnya (jumlah peserta per ekskul, riwayat prestasi, dst).
        // "Total Jadwal" aja yang beneran dihitung dari data asli.
        $stats = [
            ['label' => 'TOTAL EKSKUL', 'value' => $ekskuls->count(), 'icon' => '📅'],

        ];

        return view('admin.ekskul.index', compact('ekskuls', 'stats'));
    }

    /**
     * Tampilkan form tambah ekstrakurikuler baru.
     */
    public function create(): View
    {
        return view('admin.ekskul.create', ['kategoriOptions' => $this->kategoriOptions]);
    }

    /**
     * Simpan ekstrakurikuler baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('ekskul', 'public');
        }

        Ekskul::create($validated);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Ekstrakurikuler baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(Ekskul $ekskul): View
    {
        return view('admin.ekskul.edit', [
            'ekskul' => $ekskul,
            'kategoriOptions' => $this->kategoriOptions,
        ]);
    }

    /**
     * Update ekstrakurikuler yang sudah ada.
     */
    public function update(Request $request, Ekskul $ekskul): RedirectResponse
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($ekskul->foto && ! str_starts_with($ekskul->foto, 'http') && Storage::disk('public')->exists($ekskul->foto)) {
                Storage::disk('public')->delete($ekskul->foto);
            }
            $validated['foto'] = $request->file('foto')->store('ekskul', 'public');
        }

        $ekskul->update($validated);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    /**
     * Hapus ekstrakurikuler.
     */
    public function destroy(Ekskul $ekskul): RedirectResponse
    {
        if ($ekskul->foto && ! str_starts_with($ekskul->foto, 'http') && Storage::disk('public')->exists($ekskul->foto)) {
            Storage::disk('public')->delete($ekskul->foto);
        }

        $ekskul->delete();

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}