@extends('layouts.auth')

@section('title', 'Login Admin - PT Solusi Koneksi Anda')

@push('styles')
    @vite('resources/css/pages/auth.css')
@endpush

@section('content')

    <div class="login-bg min-h-screen flex flex-col items-center justify-center px-4 py-10">
        <img src="{{ asset('images/home/hero.png') }}" alt="" class="login-bg-img">
        <div class="login-bg-overlay"></div>

        <div class="relative flex-1 flex items-center w-full max-w-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full p-8">

            {{-- Logo + judul --}}
            <div class="text-center mb-6">
                <img src="{{ asset('images/home/logo.png') }}" alt="Logo PT Solusi Koneksi Anda"
                    class="block h-24 w-auto mx-auto mb-4 object-contain">
                <h1 class="text-navy font-bold text-lg">Portal Administrasi</h1>
                <p class="text-gray-400 text-xs uppercase tracking-wide">PT Solusi Koneksi Anda</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3 mb-5">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-navy mb-2">Username atau Email</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">👤</span>
                        <input type="text" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Masukkan email"
                               class="w-full pl-9 pr-3 py-2.5 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-navy mb-2">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">🔒</span>
                        <input type="password" id="password" name="password"
                               placeholder="Masukkan password"
                               class="w-full pl-9 pr-9 py-2.5 rounded-lg border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                        <button type="button" id="toggle-password" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">
                            👁️
                        </button>
                    </div>
                </div>

                <label class="flex items-center gap-2 text-xs text-gray-500">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-navy focus:ring-navy/20">
                    Ingat saya di perangkat ini
                </label>

                <button type="submit"
                        class="w-full bg-navy hover:bg-navy-light text-white font-semibold py-3 rounded-lg transition-colors">
                    Masuk Sekarang →
                </button>
            </form>
        </div>
        </div>

        <p class="relative text-center text-xs text-gray-300 mt-6">
            &copy; {{ date('Y') }} PT Solusi Koneksi Anda. All Rights Reserved.
        </p>
    </div>

@endsection

@push('scripts')
@vite(['resources/css/pages/auth.css', 'resources/js/pages/auth.js'])
@endpush