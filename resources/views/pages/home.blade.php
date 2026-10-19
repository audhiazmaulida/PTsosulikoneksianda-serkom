@extends('layouts.app')

@section('title', 'Beranda - PT Solusi Koneksi Anda')

@push('styles')
    @vite('resources/css/pages/home.css')
@endpush

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative">
        <div class="hero-bg">
            <img src="{{ asset('images/home/hero.png') }}" alt="PT Solusi Koneksi Anda" class="w-full h-full object-cover">
            <div class="hero-overlay"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pt-14 pb-24 sm:pt-16 sm:pb-32 lg:pt-20 lg:pb-40">
            <h1 class="text-white text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight max-w-xl">
                Solusi Teknologi <br>
                <span class="text-gold">untuk Bisnis Anda</span>
            </h1>
            <p class="text-gray-200 mt-4 max-w-md text-sm md:text-base">
                PT Solusi Koneksi Anda menghadirkan layanan pembuatan website, pengembangan aplikasi,
                dan infrastruktur jaringan yang andal agar bisnis Anda selalu terhubung.
            </p>

            <div class="flex flex-wrap gap-3 sm:gap-4 mt-8">
                <a href="{{ route('profile') }}"
                   class="bg-navy hover:bg-navy-light text-white font-semibold px-5 py-3 sm:px-6 rounded-lg transition-colors text-sm sm:text-base">
                    Profil Perusahaan
                </a>
                <a href="{{ route('kontak') }}"
                   class="bg-gold hover:bg-gold-dark text-navy font-semibold px-5 py-3 sm:px-6 rounded-lg transition-colors text-sm sm:text-base">
                    Hubungi Kami
                </a>
            </div>
        </div>

        {{-- 4 kartu keunggulan (overlap ke atas lewat CSS) --}}
                {{-- 4 kartu keunggulan (overlap ke atas lewat CSS) --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-10">
            <div class="feature-cards grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach ($features as $feature)
                    <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 border-b-4 border-{{ $feature['accent'] }} text-center">
                        {{-- Lingkaran ikon: ikon diposisikan di tengah, ukurannya diatur per ikon --}}
                        <div class="relative w-14 h-14 mx-auto mb-4 rounded-full bg-{{ $feature['accent'] }}/10">
                            <img src="{{ asset('images/home/' . $feature['icon']) }}" alt="{{ $feature['title'] }}"
                                 class="absolute object-contain"
                                 style="top: 50%; left: 50%; transform: translate(-50%, -50%); width: {{ $feature['icon_size'] }}px; height: {{ $feature['icon_size'] }}px;">
                        </div>
                        <h3 class="font-bold text-navy mb-2">{{ $feature['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $feature['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- STATISTIK --}}
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

    {{-- ARTIKEL TERBARU + LAYANAN KAMI --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 py-12 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Artikel terbaru (2 kolom) --}}
            <div class="lg:col-span-2">
                <div class="flex items-center justify-between mb-6 gap-3">
                    <div class="border-l-4 border-gold pl-3">
                        <h2 class="text-xl font-bold text-navy">Artikel Terbaru</h2>
                        <p class="text-sm text-gray-500">Informasi dan kabar terkini dari PT Solusi Koneksi Anda</p>
                    </div>
                    <a href="{{ route('artikel.index') }}" class="text-sm font-semibold text-navy hover:text-gold whitespace-nowrap">Lihat Artikel →</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @forelse ($artikels as $artikel)
                        <a href="{{ route('artikel.show', $artikel) }}" class="block bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-shadow">
                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <span class="text-xs text-gray-400">
                                    {{ $artikel->tanggal_publikasi->locale('id')->translatedFormat('d F Y') }}
                                </span>
                                <h3 class="font-bold text-navy mt-1 mb-2 leading-snug">{{ $artikel->judul }}</h3>
                                <p class="text-sm text-gray-500 mb-3">{{ \Illuminate\Support\Str::limit(strip_tags($artikel->deskripsi), 100) }}</p>
                                <span class="bg-gold text-navy text-xs font-semibold px-3 py-1 rounded-full">{{ $artikel->kategori }}</span>
                            </div>
                        </a>
                    @empty
                        <p class="text-sm text-gray-400 sm:col-span-2">Belum ada artikel.</p>
                    @endforelse
                </div>
            </div>

            {{-- Layanan kami (1 kolom) --}}
            <div>
                <div class="flex items-center justify-between mb-6 gap-3">
                    <div class="border-l-4 border-gold pl-3">
                        <h2 class="text-xl font-bold text-navy">Layanan Kami</h2>
                        <p class="text-sm text-gray-500">Layanan unggulan untuk kebutuhan bisnis Anda</p>
                    </div>
                </div>

                <div class="space-y-4">
                    @forelse ($layanans as $layanan)
                        <div class="flex items-center gap-4 bg-white border border-gray-100 rounded-xl p-3 shadow-sm">
                            <img src="{{ $layanan->gambar ?? asset('images/artikel-placeholder.png') }}" alt="{{ $layanan->nama }}"
                                 class="w-14 h-14 object-cover rounded-lg flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-navy text-sm">{{ $layanan->nama }}</h4>
                                <p class="text-xs text-gray-500">{{ \Illuminate\Support\Str::limit($layanan->deskripsi, 60) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Belum ada layanan.</p>
                    @endforelse
                </div>

                <a href="{{ route('produk.index') }}" class="inline-block mt-5 text-sm font-semibold text-navy hover:text-gold">Semua Layanan →</a>
            </div>
        </div>
    </section>

    {{-- GALERI KEGIATAN --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 pb-12 sm:pb-16">
        <div class="flex items-center justify-between mb-6 gap-3">
            <div class="border-l-4 border-gold pl-3">
                <h2 class="text-xl font-bold text-navy">Galeri</h2>
                <p class="text-sm text-gray-500">Dokumentasi kegiatan PT Solusi Koneksi Anda</p>
            </div>
            <a href="{{ route('galeri.index') }}" class="text-sm font-semibold text-navy hover:text-gold whitespace-nowrap">Lihat Galeri →</a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
            @forelse ($galeris as $galeri)
                <div class="rounded-xl overflow-hidden aspect-square">
                    <img src="{{ $galeri->foto_url }}" alt="{{ $galeri->kategori }}"
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
            @empty
                <p class="text-sm text-gray-400 col-span-full">Belum ada foto galeri.</p>
            @endforelse
        </div>
    </section>

@endsection