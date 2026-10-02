@extends('layouts.app')

@section('title', 'Artikel & Berita - SMK Negeri 4 Bogor')

@push('styles')
    @vite('resources/css/pages/artikel.css')
@endpush

@section('content')

    {{-- HEADER BANNER --}}

    <section class="bg-navy">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 py-16 text-center">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">Artikel & Berita</h1>
            <p class="text-gray-300 text-sm md:text-base">
                Temukan kabar terbaru seputar kegiatan sekolah, prestasi siswa, dan informasi penting
                lainnya di SMK Negeri 4 Bogor.
            </p>
        </div>
    </section>

    {{-- GRID ARTIKEL --}}

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($artikels as $artikel)
                <article class="artikel-card bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">

                    @if ($artikel['is_collage'] ?? false)
                        <div class="w-full h-48 thumb-collage" style="background-image: url('{{ $artikel['thumbnail'] }}')"></div>
                    @else
                        <img src="{{ $artikel['thumbnail'] }}" alt="{{ $artikel['judul'] }}" class="w-full h-48 object-cover">
                    @endif

                    <div class="p-5">
                        <span class="inline-block {{ $artikel['badge_class'] }} text-xs font-semibold px-3 py-1 rounded-full mb-3">
                            {{ strtoupper($artikel['kategori']) }}
                        </span>

                        <h3 class="font-bold text-navy mb-2 leading-snug">{{ $artikel['judul'] }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $artikel['ringkasan'] }}</p>

                        <div class="border-t border-gray-100 pt-3 flex items-center justify-between text-xs text-gray-500">
                            <span>{{ $artikel['tanggal'] }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

@endsection