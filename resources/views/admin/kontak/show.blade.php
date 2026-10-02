@extends('layouts.admin')

@section('title', 'Balas Pesan - Admin')
@section('page-title', 'Admin Dashboard / Kontak / Balas Pesan')

@section('content')

    <a href="{{ route('admin.kontak.index') }}" class="text-sm text-navy hover:text-gold font-semibold mb-4 inline-block">
        ← Kembali ke Daftar Kontak & Pesan
    </a>

    <h1 class="text-xl font-bold text-navy mb-1">Detail & Balas Pesan Masuk</h1>
    <p class="text-sm text-gray-500 mb-6">Kelola pesan dari pengunjung dan berikan tanggapan yang sesuai dengan kebutuhan.</p>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- KOLOM KIRI: detail pesan masuk --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <span class="text-xs text-gray-400 uppercase tracking-wide">Status Pesan</span>
            <div class="mb-5 mt-1">
                <span class="inline-block {{ $kontak->status_badge }} text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wide">
                    {{ $kontak->status }}
                </span>
            </div>

            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-full bg-navy text-white flex items-center justify-center font-bold text-sm">
                    {{ strtoupper(substr($kontak->nama, 0, 2)) }}
                </div>
                <div>
                    <p class="font-bold text-navy">{{ $kontak->nama }}</p>
                    <p class="text-xs text-gray-400">✉️ {{ $kontak->email }}</p>
                </div>
            </div>

            <p class="text-xs text-gray-400 mb-5">
                Tanggal Diterima: {{ $kontak->created_at->translatedFormat('d M Y • H:i') }} WIB
            </p>

            <div class="mb-4">
                <span class="text-xs font-semibold text-navy uppercase tracking-wide">Subjek Pesan</span>
                <p class="font-semibold text-navy mt-1">{{ $kontak->subjek }}</p>
            </div>

            <div class="mb-5">
                <span class="text-xs font-semibold text-navy uppercase tracking-wide">Isi Pesan Masuk</span>
                <div class="bg-gray-50 rounded-lg p-4 mt-2 text-sm text-gray-600 leading-relaxed whitespace-pre-line">
                    {{ $kontak->pesan }}
                </div>
            </div>

            {{-- Tandai terbaca tanpa balas --}}
            @if ($kontak->status !== 'Sudah Dibalas')
                <form action="{{ route('admin.kontak.tandai-dibaca', $kontak) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-navy hover:text-gold font-semibold">
                        ✓ Tandai Terbaca Saja
                    </button>
                </form>
            @endif
        </div>

        {{-- KOLOM KANAN: form balasan (disimpan ke DB) --}}
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <h2 class="font-bold text-navy mb-1">Kirim Balasan</h2>
            <p class="text-xs text-gray-400 mb-5">
                ⚠️ Balasan ini akan DISIMPAN sebagai catatan di sistem, bukan dikirim sebagai email asli ke {{ $kontak->email }}.
            </p>

            @if ($kontak->balasan)
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-5">
                    <p class="text-xs font-semibold text-green-700 uppercase tracking-wide mb-2">
                        Balasan Tersimpan ({{ $kontak->dibalas_pada->translatedFormat('d M Y • H:i') }})
                    </p>
                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $kontak->balasan }}</p>
                </div>
            @endif

            <form action="{{ route('admin.kontak.balas', $kontak) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-navy uppercase tracking-wide mb-2">Kepada (Penerima)</label>
                    <input type="text" value="{{ $kontak->email }}" disabled
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-gray-50 text-sm text-gray-500">
                </div>

                <div class="mb-5">
                    <label for="balasan" class="block text-xs font-semibold text-navy uppercase tracking-wide mb-2">Isi Balasan</label>
                    <textarea id="balasan" name="balasan" rows="8"
                              placeholder="Tulis balasan untuk {{ $kontak->nama }} di sini..."
                              class="w-full px-4 py-3 rounded-lg border {{ $errors->has('balasan') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20 resize-none">{{ old('balasan', $kontak->balasan) }}</textarea>
                    @error('balasan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="lampiran" class="block text-xs font-semibold text-navy uppercase tracking-wide mb-2">Lampiran (Opsional)</label>
                    <input type="file" id="lampiran" name="lampiran"
                           class="w-full text-sm text-gray-500 file:mr-4 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-navy/10 file:text-navy file:text-sm file:font-semibold hover:file:bg-navy/20">
                    @error('lampiran')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    @if ($kontak->lampiran)
                        <p class="text-xs text-gray-400 mt-2">
                            📎 File saat ini: <a href="{{ asset('storage/' . $kontak->lampiran) }}" target="_blank" class="text-navy hover:text-gold underline">lihat lampiran</a>
                        </p>
                    @endif
                </div>

                <button type="submit"
                        class="w-full bg-gold hover:bg-gold-dark text-navy font-semibold py-3 rounded-lg transition-colors">
                    💾 Simpan Balasan Sekarang
                </button>
            </form>
        </div>
    </div>

@endsection