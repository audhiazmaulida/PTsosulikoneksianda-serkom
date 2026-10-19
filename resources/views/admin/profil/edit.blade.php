@extends('layouts.admin')

@section('title', 'Profil Perusahaan - Admin')
@section('page-title', 'Admin Dashboard / Profil Perusahaan')

@section('content')

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-xl font-bold text-navy mb-1">Profil Perusahaan</h1>
    <p class="text-sm text-gray-500 mb-6">Perbarui informasi yang tampil di halaman Profil Perusahaan.</p>

    <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 lg:p-8">

            {{-- Foto Tentang Kami + Foto Direktur --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                <div>
                    <label class="block text-sm font-semibold text-navy mb-2">Foto Tentang Kami</label>
                    <img id="preview-tentang" src="{{ $profil->foto_tentang_url }}" alt="Foto tentang kami"
                         class="w-full h-40 object-cover rounded-lg mb-3">
                    <input type="file" id="foto_tentang" name="foto_tentang" accept="image/*"
                           class="block w-full text-sm text-gray-500">
                    <p class="text-xs text-gray-400 mt-1">JPG/PNG, maks 2MB. Kosongkan jika tidak diganti.</p>
                    @error('foto_tentang')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-navy mb-2">Foto Direktur</label>
                    <img id="preview-direktur" src="{{ $profil->foto_direktur_url }}" alt="Foto direktur"
                         class="w-40 h-40 object-cover object-top rounded-lg mb-3">
                    <input type="file" id="foto_direktur" name="foto_direktur" accept="image/*"
                           class="block w-full text-sm text-gray-500">
                    <p class="text-xs text-gray-400 mt-1">JPG/PNG, maks 2MB. Kosongkan jika tidak diganti.</p>
                    @error('foto_direktur')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Sejarah --}}
            <div class="mb-5">
                <label for="sejarah" class="block text-sm font-semibold text-navy mb-2">Sejarah / Tentang Kami</label>
                <textarea id="sejarah" name="sejarah" rows="6"
                          class="w-full px-4 py-3 rounded-lg border {{ $errors->has('sejarah') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">{{ old('sejarah', $profil->sejarah) }}</textarea>
                <p class="text-xs text-gray-400 mt-1">Tekan Enter untuk membuat paragraf baru.</p>
                @error('sejarah')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Visi --}}
            <div class="mb-5">
                <label for="visi" class="block text-sm font-semibold text-navy mb-2">Visi</label>
                <textarea id="visi" name="visi" rows="3"
                          class="w-full px-4 py-3 rounded-lg border {{ $errors->has('visi') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">{{ old('visi', $profil->visi) }}</textarea>
                @error('visi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Misi --}}
            <div class="mb-5">
                <label for="misi" class="block text-sm font-semibold text-navy mb-2">Misi</label>
                <textarea id="misi" name="misi" rows="6"
                          class="w-full px-4 py-3 rounded-lg border {{ $errors->has('misi') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">{{ old('misi', $profil->misi) }}</textarea>
                <p class="text-xs text-gray-400 mt-1">Satu misi per baris.</p>
                @error('misi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sambutan --}}
            <div class="mb-5">
                <label for="sambutan" class="block text-sm font-semibold text-navy mb-2">Sambutan Direktur</label>
                <textarea id="sambutan" name="sambutan" rows="4"
                          class="w-full px-4 py-3 rounded-lg border {{ $errors->has('sambutan') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">{{ old('sambutan', $profil->sambutan) }}</textarea>
                @error('sambutan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama + Jabatan Direktur --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">
                <div>
                    <label for="nama_direktur" class="block text-sm font-semibold text-navy mb-2">Nama Direktur</label>
                    <input type="text" id="nama_direktur" name="nama_direktur" value="{{ old('nama_direktur', $profil->nama_direktur) }}"
                           class="w-full px-4 py-3 rounded-lg border {{ $errors->has('nama_direktur') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                    @error('nama_direktur')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jabatan_direktur" class="block text-sm font-semibold text-navy mb-2">Jabatan</label>
                    <input type="text" id="jabatan_direktur" name="jabatan_direktur" value="{{ old('jabatan_direktur', $profil->jabatan_direktur) }}"
                           class="w-full px-4 py-3 rounded-lg border {{ $errors->has('jabatan_direktur') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                    @error('jabatan_direktur')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('profile') }}" target="_blank"
                   class="px-6 py-3 rounded-lg border border-gray-200 text-gray-600 text-sm font-semibold hover:bg-gray-50 transition-colors">
                    Lihat Halaman
                </a>
                <button type="submit"
                        class="bg-navy hover:bg-navy-light text-white text-sm font-semibold px-6 py-3 rounded-lg transition-colors">
                    💾 Simpan Perubahan
                </button>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
<script>
    // Preview foto sebelum disimpan
    function pasangPreview(inputId, imgId) {
        const input = document.getElementById(inputId);
        const img = document.getElementById(imgId);
        if (!input || !img) return;

        input.addEventListener('change', () => {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (e) => { img.src = e.target.result; };
            reader.readAsDataURL(file);
        });
    }

    pasangPreview('foto_tentang', 'preview-tentang');
    pasangPreview('foto_direktur', 'preview-direktur');
</script>
@endpush