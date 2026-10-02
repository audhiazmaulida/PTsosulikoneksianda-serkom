@extends('layouts.app')

@section('title', 'Beranda - SMK Negeri 4 Bogor')

@push('styles')
    @vite('resources/css/pages/home.css')
@endpush

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative">
        <div class="hero-bg">
            <img src="{{ asset('images/lap1.JPG') }}" alt="Lapangan SMK Negeri 4 Bogor" class="w-full h-full object-cover">
            <div class="hero-overlay"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pt-14 pb-24 sm:pt-16 sm:pb-32 lg:pt-20 lg:pb-40">
            <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight max-w-xl">
                Mewujudkan Generasi <br>
                <span class="text-gold">Berprestasi & Berkarakter</span>
            </h1>
            <p class="text-gray-200 mt-4 max-w-md text-sm md:text-base">
                Sekolah unggulan yang mencetak generasi berilmu, beretika, berprestasi dan berdaya
                saing tinggi dalam kancah nasional maupun internasional.
            </p>

            <div class="flex flex-wrap gap-3 sm:gap-4 mt-8">
                <a href="{{ route('profile') }}"
                   class="bg-navy hover:bg-navy-light text-white font-semibold px-5 py-3 sm:px-6 rounded-lg transition-colors text-sm sm:text-base">
                    Lihat Profil
                </a>
                <a href="{{ route('kontak') }}"
                   class="bg-gold hover:bg-gold-dark text-navy font-semibold px-5 py-3 sm:px-6 rounded-lg transition-colors text-sm sm:text-base">
                    Hubungi Kami
                </a>
            </div>
        </div>

        {{-- 4 Kartu Keunggulan, sengaja ditarik ke atas (overlap) pakai margin negatif di CSS --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="feature-cards grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($features as $feature)
                    <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 border-b-4 border-{{ $feature['accent'] }} text-center">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center bg-{{ $feature['accent'] }}/10">
                            <img src="{{ asset('images/home/' . $feature['icon']) }}" alt="{{ $feature['title'] }}" class="w-8 h-8 object-contain">
                        </div>
                        <h3 class="font-bold text-navy mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- STATS BAR --}}
    <section class="bg-navy stats-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-8 sm:py-10 grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 text-center">
            @foreach ($stats as $stat)
                <div>
                    <img src="{{ asset('images/home/' . $stat['icon']) }}" alt="{{ $stat['label'] }}" class="w-8 h-8 sm:w-9 sm:h-9 mx-auto mb-2 object-contain">
                    <div class="text-white text-xl sm:text-2xl font-bold">{{ $stat['value'] }}</div>
                    <div class="text-gray-300 text-xs tracking-wider uppercase mt-1">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ARTIKEL TERBARU + PROGRAM KEAHLIAN --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-12 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Artikel Terbaru (2 kolom) --}}
            <div class="lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <div class="border-l-4 border-gold pl-3">
                        <h2 class="text-xl font-bold text-navy">Artikel Terbaru</h2>
                        <p class="text-sm text-gray-500">Warta dan kegiatan terkini SMK Negeri 4 Bogor</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($artikels as $artikel)
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                            <img src="{{ $artikel['thumbnail'] }}" alt="{{ $artikel['judul'] }}" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-gray-400">{{ $artikel['tanggal'] }}</span>
                                <h3 class="font-bold text-navy mt-1 mb-2 leading-snug">{{ $artikel['judul'] }}</h3>
                                <p class="text-sm text-gray-500 mb-3">{{ $artikel['ringkasan'] }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="bg-gold text-navy text-xs font-semibold px-3 py-1 rounded-full">{{ $artikel['kategori'] }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- Program Keahlian (1 kolom) --}}
            <div>
                <div class="flex items-center justify-between mb-6">
                    <div class="border-l-4 border-gold pl-3">
                        <h2 class="text-xl font-bold text-navy">Program Keahlian</h2>
                        <p class="text-sm text-gray-500">Berikut 4 jurusan yang ada di SMKN 4 Bogor:</p>
                    </div>
                </div>

                <div class="space-y-4">
                    @foreach ($jurusans as $jurusan)
                        <div class="flex items-center gap-4 bg-white border border-gray-100 rounded-xl p-3 shadow-sm">
                            <img src="{{ $jurusan['logo'] }}" alt="{{ $jurusan['nama'] }}" class="w-12 h-12 object-contain flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-navy text-sm">{{ $jurusan['nama'] }}</h4>
                                <p class="text-xs text-gray-500">{{ $jurusan['deskripsi'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- GALERI TERBARU --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pb-12 sm:pb-16">
        <div class="flex items-center justify-between mb-6 gap-3">
            <div class="border-l-4 border-gold pl-3">
                <h2 class="text-xl font-bold text-navy">Galeri Terbaru</h2>
                <p class="text-sm text-gray-500">Momen berharga di lingkungan sekolah</p>
            </div>
            <a href="{{ route('galeri.index') }}" class="text-sm font-semibold text-navy hover:text-gold whitespace-nowrap">Lihat Galeri →</a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
            @foreach ($galeris as $galeri)
                <div class="rounded-xl overflow-hidden aspect-square">
                    @if ($galeri['is_collage'] ?? false)
                        <div class="w-full h-full thumb-collage" style="background-image: url('{{ $galeri['gambar'] }}')"></div>
                    @else
                        <img src="{{ $galeri['gambar'] }}" alt="{{ $galeri['judul'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    {{-- EKSTRAKULIKULER --}}
    <section class="bg-gray-50 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="flex items-center justify-between mb-8 gap-3">
                <div class="border-l-4 border-gold pl-3">
                    <h2 class="text-xl font-bold text-navy">Ekstrakulikuler</h2>
                    <p class="text-sm text-gray-500">Berbagai ekstrakulikuler yang ada di SMKN 4 Bogor</p>
                </div>
                <a href="{{ route('ekskul.index') }}" class="text-sm font-semibold text-navy hover:text-gold whitespace-nowrap">Lihat Ekskul →</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @foreach ($ekskuls as $ekskul)
                    <div class="bg-white rounded-xl shadow-sm p-5 sm:p-6 text-center border-b-4 border-gold">
                        <img src="{{ $ekskul['logo'] }}" alt="{{ $ekskul['nama'] }}" class="h-24 sm:h-28 mx-auto object-contain mb-4">
                        <h3 class="font-bold text-navy mb-2">{{ $ekskul['nama'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $ekskul['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection