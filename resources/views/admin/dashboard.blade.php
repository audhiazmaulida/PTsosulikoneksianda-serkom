@extends('layouts.admin')

@section('title', 'Admin Dashboard - PT Solusi Koneksi Anda')
@section('page-title', 'Admin Dashboard')

@section('content')

    @if (session('error'))
        <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-xl font-bold text-navy mb-1">Halo, {{ auth()->user()->name ?? 'Admin' }}</h1>

    {{-- KARTU STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        @foreach ($stats as $stat)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
                <div class="w-9 h-9 bg-navy/10 rounded-lg flex items-center justify-center mb-4">
                    <img src="{{ asset('images/dbadmin/' . $stat['icon']) }}" alt="{{ $stat['label'] }}" class="w-5 h-5 object-contain">
                </div>
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">{{ $stat['label'] }}</p>
                <p class="text-2xl font-bold text-navy mb-2">{{ $stat['value'] }}</p>
                <a href="{{ route($stat['route']) }}" class="text-xs font-semibold text-navy hover:text-gold">
                    Lihat Detail →
                </a>
            </div>
        @endforeach
    </div>


@endsection