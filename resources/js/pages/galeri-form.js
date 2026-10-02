document.addEventListener('DOMContentLoaded', () => {
    const inputFile = document.getElementById('foto');
    const namaFile = document.getElementById('nama-file-terpilih');
    const previewGambar = document.getElementById('previewGambar');

    if (inputFile && namaFile) {
        inputFile.addEventListener('change', () => {
            const file = inputFile.files[0];

            namaFile.textContent = file ? `File dipilih: ${file.name}` : '';

            if (file && previewGambar) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewGambar.src = e.target.result;
                    previewGambar.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    }
});