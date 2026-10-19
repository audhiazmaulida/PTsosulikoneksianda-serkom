@extends('layouts.app')

@section('title', 'Produk / Layanan - PT Solusi Koneksi Anda')

@section('content')

    {{-- HEADER BANNER --}}
    <section class="bg-navy">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
            <div class="text-sm text-gray-300 mb-3">
                <a href="{{ route('home') }}" class="hover:text-gold">Home</a>
                <span class="mx-1">›</span>
                <span class="text-white font-semibold">Produk / Layanan</span>
            </div>
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">Produk / Layanan</h1>
            <p class="text-gray-300 text-sm md:text-base max-w-2xl">
                Solusi teknologi informasi dan jaringan dari PT Solusi Koneksi Anda untuk mendukung
                kebutuhan dan pertumbuhan bisnis Anda.
            </p>
        </div>
    </section>

    {{-- GRID LAYANAN --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
        @if ($produks->isEmpty())
            <p class="text-center text-gray-400 py-16">Belum ada layanan yang ditampilkan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($produks as $produk)
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                        <img src="{{ $produk->gambar ?? asset('images/artikel-placeholder.png') }}" alt="{{ $produk->nama }}"
                            class="block w-full object-cover" style="aspect-ratio: 4 / 3;">

                        <div class="p-5 flex flex-col flex-1">
                            <span class="text-xs text-gray-400 uppercase tracking-wide">{{ $produk->kategori }}</span>
                            <h3 class="font-bold text-navy mt-1 mb-2">{{ $produk->nama }}</h3>
                            <p class="text-sm text-gray-500 mb-4 flex-1">{{ \Illuminate\Support\Str::limit($produk->deskripsi, 120) }}</p>

                            <div class="border-t border-gray-100 pt-3 flex items-center justify-between gap-3">
                                <div>
                                    @if ($produk->harga)
                                        <p class="text-xs text-gray-400">Mulai dari</p>
                                    @endif
                                    <p class="font-bold text-navy">{{ $produk->formatted_harga }}</p>
                                </div>
                                <a href="{{ route('kontak') }}"
                                   class="bg-gold hover:bg-gold-dark text-navy text-xs font-semibold px-4 py-2 rounded-lg transition-colors whitespace-nowrap">
                                    Konsultasi
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

@endsection