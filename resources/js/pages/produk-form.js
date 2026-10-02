// resources/js/pages/produk-form.js
// Logic untuk form Tambah/Edit Produk: upload foto (klik & drag-and-drop) + preview.
// Dipanggil dari create.blade.php dan edit.blade.php lewat @vite('resources/js/pages/produk-form.js')

const uploadBox = document.getElementById('uploadBox');
const thumbnailInput = document.getElementById('thumbnailInput');
const uploadPlaceholder = document.getElementById('uploadPlaceholder');
const imagePreview = document.getElementById('imagePreview');

if (uploadBox && thumbnailInput) {
    uploadBox.addEventListener('click', () => thumbnailInput.click());

    thumbnailInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) showPreview(file);
    });

    uploadBox.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadBox.classList.add('border-navy');
    });

    uploadBox.addEventListener('dragleave', () => {
        uploadBox.classList.remove('border-navy');
    });

    uploadBox.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadBox.classList.remove('border-navy');

        const file = e.dataTransfer.files[0];
        if (file) {
            thumbnailInput.files = e.dataTransfer.files;
            showPreview(file);
        }
    });

    function showPreview(file) {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            if (uploadPlaceholder) uploadPlaceholder.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}