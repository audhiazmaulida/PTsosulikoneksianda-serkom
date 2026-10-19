<header class="sticky top-0 z-50 bg-white shadow-sm" id="main-navbar">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-20">

            {{-- Logo + nama perusahaan --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/home/logo.png') }}" alt="Logo PT Solusi Koneksi Anda" class="h-14 w-auto object-contain">
                <span class="font-bold text-lg text-navy tracking-wide">PT SOLUSI KONEKSI ANDA</span>
            </a>

            {{-- Menu desktop --}}
            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-gray-700">
                @php
                    $menus = [
                        ['label' => 'Home', 'route' => 'home'],
                        ['label' => 'Profil Perusahaan', 'route' => 'profile'],
                        ['label' => 'Produk / Layanan', 'route' => 'produk.index'],
                        ['label' => 'Artikel', 'route' => 'artikel.index'],
                        ['label' => 'Galeri', 'route' => 'galeri.index'],
                        ['label' => 'Kontak Kami', 'route' => 'kontak'],
                    ];
                @endphp

                @foreach ($menus as $menu)
                    <a href="{{ route($menu['route']) }}"
                       class="hover:text-navy transition-colors
                              {{ request()->routeIs($menu['route']) ? 'text-navy font-semibold border-b-2 border-gold pb-1' : '' }}">
                        {{ $menu['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Tombol hamburger (mobile) --}}
            <button id="mobile-menu-btn" class="lg:hidden text-navy" aria-label="Buka menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Menu mobile --}}
        <nav id="mobile-menu" class="hidden lg:hidden pb-4 flex flex-col gap-3 text-sm font-medium text-gray-700">
            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}" class="hover:text-navy">{{ $menu['label'] }}</a>
            @endforeach
        </nav>
    </div>
</header>