@extends('layouts.admin')

@section('title', 'Kelola Pesan Masuk - Admin')
@section('page-title', 'Admin Dashboard / Kontak / Kelola Pesan Masuk')

@section('content')

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div>
            <h1 class="text-xl font-bold text-navy mb-1">Kelola Pesan & Kontak Masuk</h1>
            <p class="text-sm text-gray-500">Kelola pesan dari pengunjung website dan informasi kontak resmi SMK Negeri 4 Bogor.</p>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-100 text-left text-xs text-gray-400 uppercase tracking-wide">
                    <th class="px-5 py-3">No</th>
                    <th class="px-5 py-3">Pengirim & Kontak</th>
                    <th class="px-5 py-3">Subjek & Pesan</th>
                    <th class="px-5 py-3">Tanggal</th>
                    <th class="px-5 py-3">Status</th>
                    <th class="px-5 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesans as $pesan)
                    <tr class="border-b border-gray-50 last:border-0 {{ $pesan->status === 'Belum Dibaca' ? 'bg-gold/5' : '' }}">
                        <td class="px-5 py-4 text-gray-500">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-5 py-4">
                            <p class="font-semibold text-navy">{{ $pesan->nama }}</p>
                            <p class="text-xs text-gray-400">✉️ {{ $pesan->email }}</p>
                        </td>
                        <td class="px-5 py-4 max-w-xs">
                            <p class="font-medium text-navy">{{ Str::limit($pesan->subjek, 40) }}</p>
                            <p class="text-xs text-gray-400">{{ Str::limit($pesan->pesan, 50) }}</p>
                        </td>
                        <td class="px-5 py-4 text-gray-500 whitespace-nowrap">{{ $pesan->created_at->translatedFormat('d M Y') }}</td>
                        <td class="px-5 py-4">
                            <span class="inline-block {{ $pesan->status_badge }} text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide whitespace-nowrap">
                                {{ $pesan->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.kontak.show', $pesan) }}"
                                   class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-colors">
                                    👁️
                                </a>
                                <form action="{{ route('admin.kontak.destroy', $pesan) }}" method="POST"
                                      onsubmit="return confirm('Yakin mau hapus pesan dari {{ $pesan->nama }}?');">
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
                        <td colspan="6" class="px-5 py-10 text-center text-gray-400">
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection