@extends('layouts.admin')

@section('title', 'Manajemen Layanan - Admin')
@section('page-title', 'Admin Dashboard / Manajemen Layanan')

@section('content')

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <h1 class="text-xl font-bold text-navy mb-1">Manajemen Produk/ Layanan</h1>
            <p class="text-sm text-gray-500">Kelola daftar produk dan layanan perusahaan.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}"
           class="bg-navy hover:bg-navy-light text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors whitespace-nowrap">
            + Tambah Layanan
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 text-left text-xs text-gray-400 uppercase tracking-wide">
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Foto</th>
                    <th class="px-5 py-3">Nama Layanan</th>
                    <th class="px-5 py-3">Harga</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk as $product)
                    <tr class="border-b border-gray-50 last:border-0">
                        <td class="px-5 py-4 text-gray-500">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-5 py-4">
                            <img src="{{ $product->foto ? asset('images/' . $product->foto) : asset('images/artikel-placeholder.png') }}"
                                 alt="{{ $product->nama }}" class="w-14 h-14 object-cover rounded-lg">
                        </td>
                        <td class="px-5 py-4 max-w-xs">
                            <span class="font-semibold text-navy block">{{ $product->nama }}</span>
                            <span class="text-gray-400 text-xs">{{ Str::limit($product->deskripsi, 40) }}</span>
                        </td>
                        <td class="px-5 py-4 font-semibold text-navy whitespace-nowrap">
                            {{ $product->formatted_harga }}
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.produk.edit', $product->id) }}"
                                   class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                                    ✏️
                                </a>
                                <form action="{{ route('admin.produk.destroy', $product->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus layanan &quot;{{ $product->nama }}&quot;? Data yang sudah dihapus tidak bisa dikembalikan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-gray-400">
                            Belum ada produk. Klik "+ Tambah layanan" buat mulai menambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $produk->links() }}
    </div>

@endsection