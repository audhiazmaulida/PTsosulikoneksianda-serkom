@extends('layouts.app')

@section('title', 'Galeri Kegiatan - PT Solusi Koneksi Anda')

@section('content')

    {{-- HEADER BANNER --}}
    <section class="bg-navy">
        <div class="max-w-3xl mx-auto px-6 lg:px-10 py-16 text-center">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">Galeri Kegiatan</h1>
            <p class="text-gray-300 text-sm md:text-base">
                Dokumentasi kegiatan, suasana kantor, dan proyek yang telah dikerjakan PT Solusi Koneksi Anda.
            </p>
        </div>
    </section>

    {{-- FILTER KATEGORI --}}
    <section class="bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                @foreach ($filters as $filter)
                    @php
                        $slug = strtolower($filter);
                        $isActive = $kategoriAktif === $slug;
                    @endphp
                    <a
                        href="{{ route('galeri.index', $slug === 'semua' ? [] : ['kategori' => $slug]) }}"
                        class="text-sm font-medium px-5 py-2.5 rounded-full border transition-colors
                               {{ $isActive ? 'bg-gold text-navy border-gold' : 'bg-white text-gray-600 border-gray-200 hover:border-gold' }}">
                        {{ $filter }}
                    </a>
                @endforeach
            </div>

            {{-- GRID FOTO --}}
            @if (count($galeris) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($galeris as $galeri)
                        <div class="rounded-xl overflow-hidden aspect-[4/3] shadow-sm">
                            <img src="{{ $galeri->foto_url }}" alt="{{ $galeri->kategori }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-400 py-16">
                    Tidak ada foto di kategori ini.
                </p>
            @endif
        </div>
    </section>

@endsection