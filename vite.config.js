import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/views/**/*.blade.php', // Adiciona os arquivos Blade
                'public/assets/**/*' // Monitora imagens e outros arquivos em "public/assets"
            ],
            refresh: true, // Garante que o Live Reload funcione
        }),
    ],
    server: {
        host: 'localhost',
        watch: {
            usePolling: true,
            interval: 50, // Reduz o tempo de detecção (ajuste conforme necessário)
        },
    },
});
