<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfilAdminController extends Controller
{
    /**
     * Tampilkan form edit profil perusahaan.
     */
    public function edit(): View
    {
        $profil = ProfilPerusahaan::firstOrFail();

        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Simpan perubahan profil perusahaan.
     */
    public function update(Request $request): RedirectResponse
    {
        $profil = ProfilPerusahaan::firstOrFail();

        $validated = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sambutan' => 'required|string',
            'nama_direktur' => 'required|string|max:255',
            'jabatan_direktur' => 'required|string|max:255',
            'foto_tentang' => 'nullable|image|max:2048',
            'foto_direktur' => 'nullable|image|max:2048',
        ]);

        // Untuk tiap foto: kalau ada file baru, hapus yang lama lalu simpan yang baru
        foreach (['foto_tentang', 'foto_direktur'] as $field) {
            unset($validated[$field]);

            if ($request->hasFile($field)) {
                $this->hapusFoto($profil->{$field});
                $validated[$field] = $request->file($field)->store('profil', 'public');
            }
        }

        $profil->update($validated);

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    /**
     * Hapus file lama hanya kalau memang hasil upload (ada di storage).
     */
    private function hapusFoto(?string $path): void
    {
        if ($path && ! str_starts_with($path, 'http') && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}