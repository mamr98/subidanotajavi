import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/muestras.js', 'resources/js/imagenes.js', 'resources/js/registro.js'],
            refresh: true,
        }),
    ],
});

