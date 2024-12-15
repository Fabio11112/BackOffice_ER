import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',  'resources/css/welcome.css', 'resources/js/app.js', 'resources/js/analisa-foto.js', 'resources/css/analisa-foto.css'],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        port: 5173, 
        hmr: {
            host: 'localhost', 
        },
    },
});
