<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukAdminController extends Controller
{
    /**
     * Daftar layanan (halaman "Manajemen Produk / Layanan").
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
     * Form "Tambah Layanan Baru".
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Simpan layanan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'nullable|integer|min:0',
            'deskripsi' => 'required|string',
            'foto'      => 'required|image|mimes:png,jpg,jpeg|max:5120', // max 5MB
        ]);

        $validated['slug'] = Str::slug($validated['nama']) . '-' . uniqid();
        $validated['foto'] = $this->simpanFoto($request);

        Produk::create($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Form edit layanan.
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update layanan.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'nullable|integer|min:0',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image|mimes:png,jpg,jpeg|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['nama']) . '-' . $produk->id;

        if ($request->hasFile('foto')) {
            $this->hapusFoto($produk->foto);
            $validated['foto'] = $this->simpanFoto($request);
        } else {
            unset($validated['foto']);
        }

        $produk->update($validated);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Hapus layanan.
     */
    public function destroy(Produk $produk)
    {
        $this->hapusFoto($produk->foto);
        $produk->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * Simpan foto ke public/images/layanan, kembalikan path relatif ("layanan/xxx.jpg").
     */
    private function simpanFoto(Request $request): string
    {
        $file = $request->file('foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/layanan'), $namaFile);

        return 'layanan/' . $namaFile;
    }

    private function hapusFoto(?string $foto): void
    {
        if ($foto && file_exists(public_path('images/' . $foto))) {
            unlink(public_path('images/' . $foto));
        }
    }
}