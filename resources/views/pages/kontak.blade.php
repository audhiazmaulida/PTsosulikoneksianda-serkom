@extends('layouts.app')

@section('title', 'Kontak Kami - SMK Negeri 4 Bogor')

@section('content')

    <section class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">

            {{-- HEADER --}}
            <h1 class="text-navy text-3xl md:text-4xl font-extrabold mb-3">Kontak Kami</h1>
            <p class="text-gray-500 max-w-2xl mb-10">
                Kami siap membantu Anda. Silakan hubungi kami melalui formulir di bawah ini atau
                kunjungi alamat resmi kami untuk informasi lebih lanjut mengenai SMK Negeri 4 Bogor.
            </p>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- KOLOM KIRI: 4 kartu info kontak --}}
                <div class="space-y-6">
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 shrink-0 bg-navy rounded-lg flex items-center justify-center text-white">📍</div>
                        <div>
                            <h3 class="font-bold text-navy mb-1">Alamat</h3>
                            <p class="text-sm text-gray-500">{{ $infoKontak['alamat'] }}</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 shrink-0 bg-navy rounded-lg flex items-center justify-center text-white">📞</div>
                        <div>
                            <h3 class="font-bold text-navy mb-1">Telepon</h3>
                            <p class="text-sm text-gray-500">{{ $infoKontak['telepon'] }}</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 shrink-0 bg-navy rounded-lg flex items-center justify-center text-white">✉️</div>
                        <div>
                            <h3 class="font-bold text-navy mb-1">Email</h3>
                            <p class="text-sm text-gray-500">{{ $infoKontak['email'] }}</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 flex gap-4">
                        <div class="w-11 h-11 shrink-0 bg-navy rounded-lg flex items-center justify-center text-white">🕒</div>
                        <div>
                            <h3 class="font-bold text-navy mb-1">Jam Operasional</h3>
                            @foreach ($infoKontak['jam_operasional'] as $jadwal)
                                <p class="text-sm text-gray-500">
                                    {{ $jadwal['hari'] }}:
                                    <span class="font-semibold {{ $jadwal['tutup'] ? 'text-red-500' : 'text-navy' }}">
                                        {{ $jadwal['jam'] }}
                                    </span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: peta + form --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Peta lokasi --}}
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-2">
                        <iframe
                            src="https://maps.google.com/maps?q=SMK%20Negeri%204%20Bogor&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            class="w-full h-72 rounded-lg border-0" loading="lazy" title="Peta Lokasi SMK Negeri 4 Bogor">
                        </iframe>
                    </div>

                    {{-- Form Kirim Pesan --}}
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 lg:p-8">
                        <h2 class="text-xl font-bold text-navy mb-6">Kirim Pesan</h2>

                        {{-- Pesan sukses, muncul cuma sekali setelah redirect --}}
                        @if (session('success'))
                            <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('kontak.store') }}" method="POST" class="space-y-5">
                            @csrf {{-- token keamanan wajib ada di SETIAP form POST Laravel --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="nama" class="block text-sm font-semibold text-navy mb-2">Nama Lengkap</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                           placeholder="Masukkan nama Anda"
                                           class="w-full px-4 py-3 rounded-lg border {{ $errors->has('nama') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                                    @error('nama')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-navy mb-2">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                           placeholder="nama@email.com"
                                           class="w-full px-4 py-3 rounded-lg border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="subjek" class="block text-sm font-semibold text-navy mb-2">Subjek</label>
                                <input type="text" id="subjek" name="subjek" value="{{ old('subjek') }}"
                                       placeholder="Topik pesan Anda"
                                       class="w-full px-4 py-3 rounded-lg border {{ $errors->has('subjek') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                                @error('subjek')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="pesan" class="block text-sm font-semibold text-navy mb-2">Pesan</label>
                                <textarea id="pesan" name="pesan" rows="5"
                                          placeholder="Tuliskan pesan Anda di sini..."
                                          class="w-full px-4 py-3 rounded-lg border {{ $errors->has('pesan') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20 resize-none">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                        class="bg-navy hover:bg-navy-light text-white font-semibold px-6 py-3 rounded-lg transition-colors inline-flex items-center gap-2">
                                    ➤ Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection