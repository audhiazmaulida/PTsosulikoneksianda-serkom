@extends('layouts.app')

@section('title', 'Profil Perusahaan - PT Solusi Koneksi Anda')

@push('styles')
    @vite('resources/css/pages/profile.css')
@endpush

@section('content')

    {{-- HEADER BANNER + BREADCRUMB --}}
    <section class="bg-navy">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 text-center">
            <h1 class="text-white text-xl font-bold mb-2">Profil Perusahaan</h1>
            <div class="text-sm text-gray-300">
                <a href="{{ route('home') }}" class="hover:text-gold">Home</a>
                <span class="mx-1">›</span>
                <span class="text-white font-semibold">Profil Perusahaan</span>
            </div>
        </div>
    </section>

    {{-- SEJARAH PERUSAHAAN --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-2xl font-bold text-navy mb-4">Tentang Kami</h2>
                @foreach ($profil->sejarah_paragraf as $paragraf)
                    <p class="text-gray-600 mb-4 leading-relaxed">{{ $paragraf }}</p>
                @endforeach
            </div>

            <div class="relative">
                <div class="photo-decoration"></div>
                <img src="{{ $profil->foto_tentang_url }}" alt="PT Solusi Koneksi Anda"
                     class="relative rounded-xl w-full h-80 object-cover shadow-lg">
            </div>
        </div>
    </section>

    {{-- VISI & MISI --}}
    <section class="bg-gray-50 py-16">
        <div class="max-w-5xl mx-auto px-6 lg:px-10">
            <div class="text-center mb-10">
                <h2 class="text-xl font-bold text-navy inline-block border-b-4 border-gold pb-2">Visi & Misi</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Visi --}}
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="w-11 h-11 bg-navy rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy mb-3">Visi</h3>
                    <p class="text-gray-600 italic leading-relaxed">"{{ $profil->visi }}"</p>
                </div>

                {{-- Misi --}}
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="w-11 h-11 bg-navy rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-navy mb-3">Misi</h3>
                    <ul class="space-y-3">
                        @foreach ($profil->misi_list as $item)
                            <li class="flex gap-2 text-gray-600 leading-relaxed">
                                <span class="text-gold shrink-0">✓</span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- SAMBUTAN DIREKTUR --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="bg-navy rounded-2xl p-8 lg:p-10 grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
            <img src="{{ $profil->foto_direktur_url }}" alt="{{ $profil->nama_direktur }}"
                 class="rounded-xl w-full h-72 object-cover object-top">

            <div class="lg:col-span-2">
                <h3 class="text-white font-bold mb-3">Sambutan Direktur</h3>
                <p class="text-gray-300 italic leading-relaxed mb-5">"{{ $profil->sambutan }}"</p>
                <p class="text-gold font-bold">{{ $profil->nama_direktur }}</p>
                <p class="text-gray-400 text-sm">{{ $profil->jabatan_direktur }}</p>
            </div>
        </div>
    </section>

@endsection