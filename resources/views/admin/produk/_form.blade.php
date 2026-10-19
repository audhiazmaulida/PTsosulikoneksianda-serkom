{{--
    Partial form Layanan, dipakai bareng oleh create.blade.php dan edit.blade.php.
    Variabel $produk: null kalau mode tambah, berisi model Produk kalau mode edit.
--}}

<div class="mb-6">
    <label class="block text-sm font-semibold text-navy mb-2">Unggah Foto Layanan</label>
    <div id="uploadBox"
         class="relative border-2 border-dashed border-gray-200 rounded-lg bg-gray-50 min-h-[220px] flex items-center justify-center cursor-pointer overflow-hidden">
        <input type="file" name="foto" id="thumbnailInput" accept=".png,.jpg,.jpeg" hidden>

        <div id="uploadPlaceholder" class="text-center py-10 px-4 {{ optional($produk)->foto ? 'hidden' : '' }}">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-navy flex items-center justify-center text-2xl mx-auto mb-3">☁️</div>
            <p class="text-sm font-semibold text-navy">Tarik &amp; Lepas foto disini</p>
            <p class="text-xs text-gray-400 mt-1">Atau klik untuk menelusuri file (PNG, JPG, maks 5MB)</p>
            <button type="button" class="mt-4 bg-white border border-gray-200 text-xs font-semibold px-4 py-2 rounded-lg pointer-events-none">Pilih File</button>
        </div>

        {{-- Foto disimpan di public/images, jadi langsung asset('images/...') --}}
        <img id="imagePreview" class="max-h-72 object-contain {{ optional($produk)->foto ? '' : 'hidden' }}"
             src="{{ optional($produk)->foto ? asset('images/' . $produk->foto) : '' }}" alt="Preview">
    </div>
    @error('foto')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="md:col-span-2">
        <label for="nama" class="block text-sm font-semibold text-navy mb-2">Nama Layanan</label>
        <input type="text" name="nama" id="nama" placeholder="Contoh: Pembuatan Website, Instalasi Jaringan"
               value="{{ old('nama', optional($produk)->nama) }}"
               class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-sm focus:outline-none focus:border-navy focus:bg-white">
        <p class="text-xs text-gray-400 mt-1">Gunakan nama yang jelas dan deskriptif</p>
        @error('nama')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="kategori" class="block text-sm font-semibold text-navy mb-2">Kategori</label>
        <select name="kategori" id="kategori"
                class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-sm focus:outline-none focus:border-navy focus:bg-white">
            @if (! $produk)
                <option value="" disabled {{ old('kategori') ? '' : 'selected' }}>Pilih kategori</option>
            @endif
            @foreach (['Website', 'Aplikasi', 'Jaringan', 'Konsultasi', 'Maintenance', 'Keamanan'] as $opsi)
                <option value="{{ $opsi }}" @selected(old('kategori', optional($produk)->kategori) == $opsi)>{{ $opsi }}</option>
            @endforeach
        </select>
        @error('kategori')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="harga" class="block text-sm font-semibold text-navy mb-2">Harga Mulai Dari (Opsional)</label>
        <div class="flex items-stretch border border-gray-200 rounded-lg bg-gray-50 overflow-hidden focus-within:border-navy focus-within:bg-white">
            <span class="flex items-center px-4 bg-gray-100 text-gray-500 font-semibold text-sm border-r border-gray-200">Rp</span>
            <input type="number" name="harga" id="harga" min="0" placeholder="Kosongkan jika harga disesuaikan kebutuhan"
                   value="{{ old('harga', optional($produk)->harga) }}"
                   class="flex-1 px-4 py-3 bg-transparent text-sm focus:outline-none">
        </div>
        <p class="text-xs text-gray-400 mt-1">Jika kosong, di website tampil "Hubungi kami".</p>
        @error('harga')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="deskripsi" class="block text-sm font-semibold text-navy mb-2">Deskripsi Layanan</label>
        <textarea name="deskripsi" id="deskripsi" rows="5"
                  placeholder="Jelaskan cakupan layanan, manfaat, dan hasil yang didapat klien..."
                  class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-sm focus:outline-none focus:border-navy focus:bg-white">{{ old('deskripsi', optional($produk)->deskripsi) }}</textarea>
        @error('deskripsi')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
    <a href="{{ route('admin.produk.index') }}"
       class="px-5 py-2.5 rounded-lg border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50">Batal</a>
    <button type="submit"
            class="px-5 py-2.5 rounded-lg bg-navy hover:bg-navy-light text-white text-sm font-semibold">Simpan Layanan</button>
</div>