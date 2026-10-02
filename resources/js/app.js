// File ini dimuat di SEMUA halaman (didaftarkan di layouts/app.blade.php)
// Isinya khusus untuk elemen yang juga ada di semua halaman: navbar & footer.

document.addEventListener('DOMContentLoaded', () => {
    // Toggle menu mobile (hamburger di navbar)
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Tambahkan shadow lebih tegas di navbar begitu halaman di-scroll ke bawah
    const navbar = document.getElementById('main-navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('shadow-md', window.scrollY > 10);
        });
    }
});