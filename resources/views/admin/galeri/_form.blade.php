{{-- Dipakai 2x: create.blade.php (tambah) dan edit.blade.php (ubah). --}}

<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 lg:p-8">

    {{-- Upload Foto --}}
    <div class="mb-5">
        <label class="block text-sm font-semibold text-navy mb-2">Unggah Foto</label>

        @if (($galeri ?? null) && $galeri->foto)
            <img src="{{ $galeri->foto_url }}" alt="Foto saat ini" class="w-32 h-32 object-cover rounded-lg mb-3">
        @endif
        <img id="previewGambar" alt="Preview" class="w-32 h-32 object-cover rounded-lg mb-3 hidden">


        <label for="foto" class="flex flex-col items-center justify-center gap-2 border-2 border-dashed border-gray-200 rounded-xl py-8 cursor-pointer hover:border-navy/40 transition-colors">
            <span class="text-2xl">📄</span>
            <span class="text-sm text-gray-500">Tarik dan lepas gambar di sini atau <span class="text-navy font-semibold">klik untuk pilih file</span></span>
            <span class="text-xs text-gray-400">(Maksimal 5MB, format JPG/PNG)</span>
        </label>
        <input type="file" id="foto" name="foto" accept="image/*" class="hidden">
        <p id="nama-file-terpilih" class="text-xs text-gray-500 mt-2"></p>

        @error('foto')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Kategori + Tanggal (2 kolom) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
        <div>
            <label for="kategori" class="block text-sm font-semibold text-navy mb-2">Kategori</label>
            <select id="kategori" name="kategori"
                    class="w-full px-4 py-3 rounded-lg border {{ $errors->has('kategori') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
                <option value="" disabled {{ old('kategori', ($galeri ?? null)?->kategori) ? '' : 'selected' }}>Pilih Kategori</option>
                @foreach ($kategoriOptions as $kategori)
                    <option value="{{ $kategori }}" {{ old('kategori', ($galeri ?? null)?->kategori) === $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tanggal" class="block text-sm font-semibold text-navy mb-2">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal"
                   value="{{ old('tanggal', ($galeri ?? null)?->tanggal?->format('Y-m-d')) }}"
                   class="w-full px-4 py-3 rounded-lg border {{ $errors->has('tanggal') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20">
            @error('tanggal')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Deskripsi (opsional) --}}
    <div class="mb-6">
        <label for="deskripsi" class="block text-sm font-semibold text-navy mb-2">Deskripsi (Opsional)</label>
        <textarea id="deskripsi" name="deskripsi" rows="4"
                  placeholder="Tambahkan deskripsi singkat mengenai foto..."
                  class="w-full px-4 py-3 rounded-lg border {{ $errors->has('deskripsi') ? 'border-red-400' : 'border-gray-200' }} text-sm focus:outline-none focus:ring-2 focus:ring-navy/20 resize-none">{{ old('deskripsi', ($galeri ?? null)?->deskripsi) }}</textarea>
        @error('deskripsi')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Tombol --}}
    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.galeri.index') }}"
           class="px-6 py-3 rounded-lg border border-gray-200 text-gray-600 text-sm font-semibold hover:bg-gray-50 transition-colors">
            Batal
        </a>
        <button type="submit"
                class="bg-navy hover:bg-navy-light text-white text-sm font-semibold px-6 py-3 rounded-lg transition-colors">
            💾 Simpan
        </button>
    </div>
</div>