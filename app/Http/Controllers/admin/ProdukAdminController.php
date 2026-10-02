<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukAdminController extends Controller
{
    /**
     * Menampilkan daftar produk (halaman "Manajemen Produk").
     */
    public function index(Request $request)
    {
        $query = Produk::query()->latest();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $produk = $query->paginate(10)->withQueryString();

        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Menampilkan form "Tambah Produk Baru".
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'required|integer|min:0',
            'stok'      => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto'      => 'required|image|mimes:png,jpg,jpeg|max:5120', // max 5MB
        ]);

        $validated['slug'] = Str::slug($validated['nama']) . '-' . uniqid();

        // Simpan file langsung ke public/images
        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $namaFile);
        $validated['foto'] = $namaFile;

        Produk::create($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Mengupdate produk yang sudah ada.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'required|integer|min:0',
            'stok'      => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['nama']) . '-' . $produk->id;

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if ($produk->foto && file_exists(public_path('images/' . $produk->foto))) {
                unlink(public_path('images/' . $produk->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $namaFile);
            $validated['foto'] = $namaFile;
        }

        $produk->update($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk.
     */
    public function destroy(Produk $produk)
    {
        if ($produk->foto && file_exists(public_path('images/' . $produk->foto))) {
            unlink(public_path('images/' . $produk->foto));
        }

        $produk->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}