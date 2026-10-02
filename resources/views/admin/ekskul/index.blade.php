@extends('layouts.admin')

@section('title', 'Kelola Ekstrakurikuler - Admin')
@section('page-title', 'Admin Dashboard')

@section('content')

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <h1 class="text-xl font-bold text-navy mb-1">Kelola Ekstrakurikuler</h1>
            <p class="text-sm text-gray-500">Kelola daftar kegiatan ekstrakurikuler untuk siswa SMK Negeri 4 Bogor.</p>
        </div>
        <a href="{{ route('admin.ekskul.create') }}"
           class="bg-gold hover:bg-gold-dark text-navy text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors whitespace-nowrap">
            + Tambah Ekstrakurikuler
        </a>
    </div>

<!-- kartu statistik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        @foreach ($stats as $stat)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex items-center gap-4">
                <div class="w-11 h-11 shrink-0 bg-navy/10 rounded-lg flex items-center justify-center text-lg">
                    {{ $stat['icon'] }}
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">{{ $stat['label'] }}</p>
                    <p class="text-2xl font-bold text-navy leading-tight mt-1">{{ $stat['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>


    <!-- tabel -->
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
        <div class="px-5 py-4 border-b border-gray-100">
            <h2 class="font-bold text-navy">Daftar Ekstrakurikuler</h2>
        </div>
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 text-left text-xs text-gray-400 uppercase tracking-wide">
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Foto</th>
                    <th class="px-5 py-3">Nama Ekstrakurikuler</th>
                    <th class="px-5 py-3">Deskripsi Singkat</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ekskuls as $ekskul)
                    <tr class="border-b border-gray-50 last:border-0">
                        <td class="px-5 py-4 text-gray-500">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-5 py-4">
                            <img src="{{ $ekskul->foto_url }}" alt="{{ $ekskul->nama }}" class="w-14 h-14 object-cover rounded-lg">
                        </td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-navy">{{ $ekskul->nama }}</p>
                            <span class="inline-block bg-navy/10 text-navy text-[10px] font-semibold px-2 py-0.5 rounded uppercase tracking-wide mt-1">
                                {{ $ekskul->kategori }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-gray-500 max-w-sm">{{ Str::limit($ekskul->deskripsi, 80) }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.ekskul.edit', $ekskul) }}"
                                   class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                                    ✏️
                                </a>
                                <form action="{{ route('admin.ekskul.destroy', $ekskul) }}" method="POST"
                                      onsubmit="return confirm('Yakin mau hapus ekstrakurikuler ini?');">
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
                            Belum ada ekstrakurikuler. Klik "+ Tambah Ekstrakurikuler" buat mulai nambahin.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection