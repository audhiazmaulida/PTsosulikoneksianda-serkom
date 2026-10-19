@extends('layouts.app')

@section('title', $artikel->judul . ' - PT Solusi Koneksi Anda')
@section('description', \Illuminate\Support\Str::limit(strip_tags($artikel->deskripsi), 150))

@section('content')

    {{-- HEADER BANNER + BREADCRUMB --}}
    <section class="bg-navy">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 py-12">
            <div class="text-sm text-gray-300 mb-3">
                <a href="{{ route('home') }}" class="hover:text-gold">Home</a>
                <span class="mx-1">›</span>
                <a href="{{ route('artikel.index') }}" class="hover:text-gold">Artikel</a>
                <span class="mx-1">›</span>
                <span class="text-white font-semibold">Detail</span>
            </div>
            <h1 class="text-white text-2xl md:text-4xl font-extrabold leading-tight">{{ $artikel->judul }}</h1>
        </div>
    </section>

    {{-- ISI ARTIKEL --}}
    <article class="max-w-4xl mx-auto px-6 lg:px-10 py-12">

        <div class="flex flex-wrap items-center gap-3 mb-6 text-sm text-gray-500">
            <span class="inline-block {{ $badgeClass }} text-xs font-semibold px-3 py-1 rounded-full">
                {{ strtoupper($artikel->kategori) }}
            </span>
            <span>{{ optional($artikel->tanggal_publikasi)->locale('id')->translatedFormat('d F Y') }}</span>
        </div>

        <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}"
             class="block w-full rounded-xl shadow-sm object-cover mb-8" style="aspect-ratio: 16 / 9;">

        <div class="space-y-5 text-gray-700 leading-relaxed text-base">
            @foreach ($paragraf as $p)
                <p>{{ $p }}</p>
            @endforeach
        </div>

        <div class="mt-10 pt-6 border-t border-gray-100">
            <a href="{{ route('artikel.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-navy hover:text-gold transition-colors">
                ← Kembali ke Artikel
            </a>
        </div>
    </article>

    {{-- ARTIKEL LAINNYA --}}
    @if ($lainnya->isNotEmpty())
        <section class="bg-gray-50 py-14">
            <div class="max-w-7xl mx-auto px-6 lg:px-10">
                <div class="border-l-4 border-gold pl-3 mb-8">
                    <h2 class="text-xl font-bold text-navy">Artikel Lainnya</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($lainnya as $item)
                        <a href="{{ route('artikel.show', $item) }}"
                           class="block bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow">
                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}"
                                 class="block w-full object-cover" style="aspect-ratio: 16 / 9;">
                            <div class="p-4">
                                <span class="text-xs text-gray-400">
                                    {{ strtoupper($item->kategori) }} · {{ optional($item->tanggal_publikasi)->locale('id')->translatedFormat('d F Y') }}
                                </span>
                                <h3 class="font-bold text-navy mt-1 leading-snug">{{ $item->judul }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection