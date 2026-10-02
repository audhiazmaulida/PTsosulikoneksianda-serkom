<footer class="bg-navy text-gray-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- Kolom 1: Tentang Sekolah --}}
        <div>
            <h3 class="text-white font-bold text-lg mb-3">SMK NEGERI 4 BOGOR</h3>
            <p class="text-sm leading-relaxed mb-4">
                Mewujudkan generasi unggul, berkarakter, dan kompeten di bidang teknologi dan kejuruan.
                Siap kerja, santun, mandiri, dan kreatif.
            </p>
            <div class="flex gap-3">
                {{-- Icon sosial media — sekarang pakai file gambar dari public/images/icons/,
                     bukan kode SVG lagi. Tinggal ganti nama file di array $socials kalau
                     mau ganti icon/urutan. --}}
                @php
                    $socials = [
                        ['label' => 'TikTok', 'icon' => 'tiktok.png', 'url' => 'https://www.tiktok.com/@smkn4kotabogor'],
                        ['label' => 'Instagram', 'icon' => 'instagram.png', 'url' => 'https://www.instagram.com/smkn4kotabogor/'],
                        ['label' => 'YouTube', 'icon' => 'youtube.png', 'url' => 'https://www.youtube.com/@smknegeri4bogor905'],
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

        {{-- Kolom 2: Alamat --}}
        <div>
            <h4 class="text-white font-semibold mb-3 pb-1 border-b border-gold inline-block">Alamat</h4>
            <p class="text-sm leading-relaxed flex gap-2 mt-3">
                <span>📍</span>
                <span>Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara Sari, Kec. Bogor Selatan, Kota Bogor, Jawa Barat 16137</span>
            </p>

            {{-- Peta lokasi sekolah --}}
            <div class="mt-4 rounded-lg overflow-hidden">
                <iframe
                    src="https://maps.google.com/maps?q=SMK%20Negeri%204%20Bogor&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    class="w-full h-32 border-0" loading="lazy" title="Peta Lokasi SMK Negeri 4 Bogor">
                </iframe>
            </div>
        </div>

        {{-- Kolom 3: Kontak --}}
        <div>
            <h4 class="text-white font-semibold mb-3 pb-1 border-b border-gold inline-block">Kontak</h4>
            <ul class="text-sm space-y-2 mt-3">
                <li class="flex items-center gap-2">📞 (0251) 7547381</li>
                <li class="flex items-center gap-2">✉️ smkn4@smkn4bogor.sch.id</li>
                <li class="flex items-center gap-2">🕒 Senin - Jumat: 07.00 - 15.00</li>
            </ul>
        </div>

        {{-- Kolom 4: Ikuti Kami --}}
        <div>
            <h4 class="text-white font-semibold mb-3 pb-1 border-b border-gold inline-block">Jelajahi Sekolah</h4>
            <ul class="text-sm space-y-2 mt-3">
                <li><a href="{{ route('artikel.index') }}" class="hover:text-gold">Profil Sekolah</a></li>
                <li><a href="#" class="hover:text-gold">Program Keahlian</a></li>
                <li><a href="#" class="hover:text-gold">Artikel & Berita</a></li>
                <li><a href="#" class="hover:text-gold">Galeri Kegiatan</a></li>
                <li><a href="#" class="hover:text-gold">Ekstrakurikuler </a></li>
            </ul>
        </div>
    </div>

    {{-- Copyright bar --}}
    <div class="border-t border-navy-light">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-4 flex flex-col sm:flex-row justify-between text-xs text-gray-400 gap-2">
            <span>&copy; {{ date('Y') }} SMK Negeri 4 Bogor. All Rights Reserved.</span>
        </div>
    </div>
</footer>