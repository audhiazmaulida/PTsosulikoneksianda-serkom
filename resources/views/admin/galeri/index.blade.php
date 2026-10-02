@extends('layouts.admin')

@section('title', 'Kelola Galeri - Admin')
@section('page-title', 'Admin Dashboard / Galeri')

@section('content')

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <h1 class="text-xl font-bold text-navy mb-1">Kelola Galeri Sekolah</h1>
            <p class="text-sm text-gray-500">Daftar dokumentasi kegiatan dan fasilitas sekolah.</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}"
           class="bg-navy hover:bg-navy-light text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors whitespace-nowrap">
            + Tambah Galeri
        </a>
    </div>

    {{-- Search --}}
    <form action="{{ route('admin.galeri.index') }}" method="GET" class="mb-6">
        <div class="relative max-w-sm">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
            <input type="text" name="cari" value="{{ $cari }}"
                   placeholder="Cari kategori galeri..."
                   class="w-full pl-11 pr-4 py-2.5 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
        </div>
    </form>

    {{-- Tabel --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 text-left text-xs text-gray-400 uppercase tracking-wide">
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Foto</th>
                    <th class="px-5 py-3">Kategori</th>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galeris as $galeri)
                    <tr class="border-b border-gray-50 last:border-0">
                        <td class="px-5 py-4 text-gray-500">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-5 py-4">
                            <img src="{{ $galeri->foto_url }}" alt="{{ $galeri->kategori }}" class="w-14 h-14 object-cover rounded-lg">
                        </td>
                        <td class="px-5 py-4">
                            @php
                                $badgeColor = match ($galeri->kategori) {
                                    'Kegiatan' => 'bg-slate-200 text-slate-700',
                                    'Fasilitas' => 'bg-blue-100 text-blue-700',
                                    'Prestasi' => 'bg-gold/20 text-gold-dark',
                                    default => 'bg-gray-200 text-gray-600',
                                };
                            @endphp
                            <span class="inline-block {{ $badgeColor }} text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $galeri->kategori }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-gray-500 whitespace-nowrap">{{ $galeri->tanggal->translatedFormat('d M Y') }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.galeri.edit', $galeri) }}"
                                   class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                                    ✏️
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST"
                                      onsubmit="return confirm('Yakin mau hapus dokumentasi ini? Data yang sudah dihapus tidak bisa dikembalikan.');">
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
                            @if ($cari)
                                Tidak ada galeri dengan kategori "{{ $cari }}".
                            @else
                                Belum ada dokumentasi. Klik "+ Tambah Galeri" buat mulai nambahin.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection