<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - SMK Negeri 4 Bogor')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-navy text-white flex flex-col shrink-0">
            <div class="p-6">
                <h1 class="text-gold font-bold text-lg">Admin Panel</h1>
            </div>

            {{-- Profil admin yang lagi login --}}
            <div class="px-6 pb-6 flex items-center gap-3 border-b border-navy-light">
                <div class="w-10 h-10 rounded-full bg-navy-light flex items-center justify-center text-lg">
                    👤
                </div>
                <div>
                    <p class="text-sm font-semibold">{{ auth()->user()->name ?? 'Administrator' }}</p>
                    <p class="text-xs text-gray-400">SMKN 4 KOTA BOGOR</p>
                </div>
            </div>

            {{-- Menu navigasi --}}
            <nav class="flex-1 px-4 py-6 space-y-1 text-sm">
                @php
                    $menus = [
                        ['label' => 'Dashboard', 'icon' => 'dashboard.png', 'route' => 'admin.dashboard', 'pattern' => 'admin.dashboard'],
                        ['label' => 'Artikel', 'icon' => 'artikel.png', 'route' => 'admin.artikel.index', 'pattern' => 'admin.artikel.*'],
                        ['label' => 'Produk', 'icon' => 'produk.png', 'route' => 'admin.produk.index', 'pattern' => 'admin.produk.*'],
                        ['label' => 'Galeri', 'icon' => 'galeri.png', 'route' => 'admin.galeri.index', 'pattern' => 'admin.galeri.*'],
                        ['label' => 'Ekstrakurikuler', 'icon' => 'ekskul.png', 'route' => 'admin.ekskul.index', 'pattern' => 'admin.ekskul.*'],
                        ['label' => 'Kontak', 'icon' => 'kontak.png', 'route' => 'admin.kontak.index', 'pattern' => 'admin.kontak.*'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-colors
                              {{ request()->routeIs($menu['pattern']) ? 'bg-gold text-navy font-semibold' : 'text-gray-300 hover:bg-navy-light' }}">
                        <img src="{{ asset('images/dbadmin/' . $menu['icon']) }}" alt="{{ $menu['label'] }}" class="w-5 h-5 object-contain">
                        {{ $menu['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-navy-light">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-300 hover:bg-navy-light w-full text-sm transition-colors">
                        <span>🚪</span> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- KONTEN UTAMA --}}
        <div class="flex-1 flex flex-col">
            {{-- Topbar --}}
            <header class="bg-white border-b border-gray-100 px-6 py-4 flex items-center gap-3">
                <h2 class="font-semibold text-navy">@yield('page-title', 'Admin Dashboard')</h2>
            </header>

            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>