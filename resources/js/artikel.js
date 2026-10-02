document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('artikel-search');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.artikel-card');
    const emptyMessage = document.getElementById('artikel-empty');

    let activeFilter = 'semua'; // filter kategori yang lagi aktif
    let keyword = '';           // kata kunci pencarian yang lagi diketik

    /**
     * Fungsi utama: cek ulang semua card, tampilkan/sembunyikan
     * berdasarkan activeFilter DAN keyword sekaligus (harus keduanya cocok).
     */
    function applyFilter() {
        let visibleCount = 0;

        cards.forEach((card) => {
            const kategori = card.dataset.kategori;
            const judul = card.dataset.judul;

            const cocokFilter = activeFilter === 'semua' || kategori === activeFilter;
            const cocokKeyword = judul.includes(keyword);

            const tampil = cocokFilter && cocokKeyword;
            card.classList.toggle('is-hidden', !tampil);

            if (tampil) visibleCount++;
        });

        // Kalau tidak ada satupun card yang cocok, tampilkan pesan kosong
        emptyMessage.classList.toggle('hidden', visibleCount > 0);
    }

    // Event: klik tombol filter kategori
    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            activeFilter = btn.dataset.filter;

            // Update tampilan tombol: yang diklik jadi aktif (navy), sisanya normal
            filterButtons.forEach((b) => {
                b.classList.remove('bg-navy', 'text-white', 'border-navy', 'is-active');
                b.classList.add('bg-white', 'text-gray-600', 'border-gray-200');
            });
            btn.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');
            btn.classList.add('bg-navy', 'text-white', 'border-navy', 'is-active');

            applyFilter();
        });
    });

    // Event: ketik di search box
    searchInput.addEventListener('input', (e) => {
        keyword = e.target.value.trim().toLowerCase();
        applyFilter();
    });
});