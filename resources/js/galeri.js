document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('#galeri-filters .filter-btn');
    const items = document.querySelectorAll('.galeri-item');
    const emptyMessage = document.getElementById('galeri-empty');

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            let visibleCount = 0;

            // Tampilkan/sembunyikan tiap foto sesuai kategori yang dipilih
            items.forEach((item) => {
                const cocok = filter === 'semua' || item.dataset.kategori === filter;
                item.classList.toggle('is-hidden', !cocok);
                if (cocok) visibleCount++;
            });

            emptyMessage.classList.toggle('hidden', visibleCount > 0);

            // Update tampilan tombol: yang diklik jadi aktif (gold), sisanya normal
            filterButtons.forEach((b) => {
                b.classList.remove('bg-gold', 'text-navy', 'border-gold', 'is-active');
                b.classList.add('bg-white', 'text-gray-600', 'border-gray-200');
            });
            btn.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');
            btn.classList.add('bg-gold', 'text-navy', 'border-gold', 'is-active');
        });
    });
}); 