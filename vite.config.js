import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/css/pages/artikel.css',
                'resources/css/pages/auth.css',
                'resources/css/pages/galeri.css',
                'resources/css/pages/home.css',
                'resources/css/pages/profile.css',

                // JS
                'resources/js/app.js',
                'resources/js/artikel.js',
                'resources/js/pages/auth.js',
                'resources/js/galeri.js',
                'resources/js/pages/artikel-form.js',
                'resources/js/pages/galeri-form.js',
                'resources/js/pages/produk-form.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});