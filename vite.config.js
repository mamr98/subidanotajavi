import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        react(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true, // Asegúrate de que el manifiesto se genere correctamente
        outDir: 'public/build', // Asegúrate de que los archivos se generen en esta carpeta
      },
});
