@extends('layouts.app')

@section('title', 'Ekstrakurikuler - SMK Negeri 4 Bogor')

@section('content')

    {{-- HEADER BANNER --}}
    <section class="bg-navy">
        <div class="max-w-3xl mx-auto px-6 lg:px-10 py-16 text-center">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">Ekstrakurikuler</h1>
            <p class="text-gray-300 text-sm md:text-base">
                Wadah pengembangan minat, bakat, dan karakter siswa/i SMK Negeri 4 Bogor melalui
                berbagai kegiatan yang inspiratif dan kompetitif.
            </p>
        </div>
    </section>

    {{-- BREADCRUMB --}}
    <section class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-8 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-navy">Beranda</a>
            <span class="mx-1">›</span>
            <span class="text-navy font-semibold">Ekstrakurikuler</span>
        </div>

        {{-- GRID EKSTRAKURIKULER --}}
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($ekskuls as $ekskul)
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                        <div class="relative">
                            <img src="{{ $ekskul->foto_url }}" alt="{{ $ekskul->nama }}" class="w-full h-52 object-cover">
                            <span class="absolute top-3 left-3 bg-gold text-navy text-xs font-semibold px-3 py-1 rounded-md uppercase tracking-wide">
                                {{ $ekskul->kategori }}
                            </span>
                        </div>

                        <div class="p-5">
                            <h3 class="font-bold text-navy text-lg mb-2">{{ $ekskul->nama }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $ekskul->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection