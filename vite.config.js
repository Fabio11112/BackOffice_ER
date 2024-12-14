import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',  'resources/css/welcome.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: true, // Allows access via network IP
        port: 5173, // Optional: change the port if needed
        hmr: {
            host: 'localhost', // Replace with your IP for external access
        },
    },
});
