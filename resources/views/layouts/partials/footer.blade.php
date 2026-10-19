<footer class="bg-navy text-gray-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Kolom 1: Tentang perusahaan --}}
        <div>
            <h3 class="text-white font-bold text-lg mb-3">PT SOLUSI KONEKSI ANDA</h3>
            <p class="text-sm leading-relaxed mb-4">
                Penyedia solusi teknologi informasi dan jaringan yang membantu bisnis Anda
                tumbuh dengan layanan yang andal, profesional, dan terpercaya.
            </p>
            <div class="flex gap-3">
                @php
                    $socials = [
                        ['label' => 'TikTok', 'icon' => 'tiktok.png', 'url' => 'https://www.tiktok.com/@solusikoneksianda'],
                        ['label' => 'Instagram', 'icon' => 'instagram.png', 'url' => 'https://www.instagram.com/solusikoneksianda/'],
                        ['label' => 'YouTube', 'icon' => 'youtube.png', 'url' => 'https://www.youtube.com/@solusikoneksianda'],
                    ];
                @endphp

                @foreach ($socials as $social)
                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener"
                       class="w-9 h-9 flex items-center justify-center bg-navy-light rounded-lg hover:bg-gold transition-colors">
                        <img src="{{ asset('images/icon/' . $social['icon']) }}" alt="{{ $social['label'] }}" class="w-4 h-4 object-contain">
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Kolom 2: Alamat + peta --}}
        <div>
            <h4 class="text-white font-semibold mb-3 pb-1 border-b border-gold inline-block">Alamat</h4>
            <p class="text-sm leading-relaxed flex gap-2 mt-3">
                <span>📍</span>
                <span>Jl. Raya Pajajaran No. 90, Kota Bogor, Jawa Barat 16153</span>
            </p>

            <div class="mt-4 rounded-lg overflow-hidden">
                <iframe
                    src="https://maps.google.com/maps?q=Jl.%20Raya%20Pajajaran%20Bogor&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    class="w-full h-32 border-0" loading="lazy" title="Peta Lokasi PT Solusi Koneksi Anda">
                </iframe>
            </div>
        </div>

        {{-- Kolom 3: Kontak --}}
        <div>
            <h4 class="text-white font-semibold mb-3 pb-1 border-b border-gold inline-block">Kontak</h4>
            <ul class="text-sm space-y-2 mt-3">
                <li class="flex items-center gap-2">📞 (0251) 8123456</li>
                <li class="flex items-center gap-2">✉️ info@solusikoneksianda.co.id</li>
                <li class="flex items-center gap-2">🕒 Senin - Jumat: 08.00 - 17.00</li>
            </ul>
        </div>

        {{-- Kolom 4: Jelajahi --}}
        <div>
            <h4 class="text-white font-semibold mb-3 pb-1 border-b border-gold inline-block">Jelajahi</h4>
            <ul class="text-sm space-y-2 mt-3">
                <li><a href="{{ route('profile') }}" class="hover:text-gold">Profil Perusahaan</a></li>
                <li><a href="{{ route('produk.index') }}" class="hover:text-gold">Produk / Layanan</a></li>
                <li><a href="{{ route('artikel.index') }}" class="hover:text-gold">Artikel</a></li>
                <li><a href="{{ route('galeri.index') }}" class="hover:text-gold">Galeri Kegiatan</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:text-gold">Kontak Kami</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-navy-light">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-4 flex flex-col sm:flex-row justify-between text-xs text-gray-400 gap-2">
            <span>&copy; {{ date('Y') }} PT Solusi Koneksi Anda. All Rights Reserved.</span>
        </div>
    </div>
</footer>