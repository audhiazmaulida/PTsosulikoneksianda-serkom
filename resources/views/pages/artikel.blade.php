@extends('layouts.app')

@section('title', 'Artikel / Informasi Terkini - PT Solusi Koneksi Anda')

@push('styles')
    @vite('resources/css/pages/artikel.css')
@endpush

@section('content')

    {{-- HEADER BANNER --}}
    <section class="bg-navy">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 py-16 text-center">
            <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">Artikel / Informasi Terkini</h1>
            <p class="text-gray-300 text-sm md:text-base">
                Temukan kabar terbaru, tips teknologi, dan informasi penting seputar layanan
                PT Solusi Koneksi Anda.
            </p>
        </div>
    </section>

    {{-- GRID ARTIKEL --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        @if ($artikels->isEmpty())
            <p class="text-center text-gray-400 py-16">Belum ada artikel yang dipublikasikan.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($artikels as $artikel)
                    <a href="{{ route('artikel.show', $artikel['id']) }}"
                       class="artikel-card block bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <img src="{{ $artikel['thumbnail'] }}" alt="{{ $artikel['judul'] }}"
                             class="block w-full object-cover" style="aspect-ratio: 16 / 9;">

                        <div class="p-5">
                            <span class="inline-block {{ $artikel['badge_class'] }} text-xs font-semibold px-3 py-1 rounded-full mb-3">
                                {{ strtoupper($artikel['kategori']) }}
                            </span>

                            <h3 class="font-bold text-navy mb-2 leading-snug">{{ $artikel['judul'] }}</h3>
                            <p class="text-sm text-gray-500 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($artikel['ringkasan']), 130) }}</p>

                            <div class="border-t border-gray-100 pt-3 flex items-center justify-between text-xs">
                                <span class="text-gray-500">{{ $artikel['tanggal'] }}</span>
                                <span class="font-semibold text-navy">Baca selengkapnya →</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>

@endsection