@extends('layouts.app')

@section('title', 'Produk - E-Koperasi & Atribut - SMK Negeri 4 Bogor')

@section('content')

    {{-- HEADER BANNER (rata kiri, ada breadcrumb) --}}

    <section class="bg-navy">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
            <div class="text-sm text-gray-300 mb-3">
                <a href="{{ route('home') }}" class="hover:text-gold">Home</a>
                <span class="mx-1">›</span>
                <span class="text-white font-semibold">Produk</span>
            </div>
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">E-Koperasi & Atribut</h1>
            <p class="text-gray-300 text-sm md:text-base max-w-2xl">
                Lengkapi kebutuhan akademik dan identitas sekolah Anda melalui layanan koperasi digital resmi SMK Negeri 4 Bogor.
            </p>
        </div>
    </section>

    {{-- GRID PRODUK --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($produks as $produk)
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="w-full aspect-[3/4] bg-gray-50 flex items-center justify-center">
                        <img src="{{ $produk['gambar'] }}" alt="{{ $produk['nama'] }}" class="w-full h-full object-contain">
                    </div>

                    <div class="p-4">
                        <span class="text-xs text-gray-400 uppercase tracking-wide">{{ $produk['kategori'] }}</span>
                        <h3 class="font-bold text-navy mt-1 mb-3">{{ $produk['nama'] }}</h3>

                        <div class="border-t border-gray-100 pt-3">
                            <p class="font-bold text-navy">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</p>
                            <p class="text-xs text-gray-400">{{ $produk['stok'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection