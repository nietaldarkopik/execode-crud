import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
		tailwindcss(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js', //admin page
                'resources/js/front.js', //admin page
                'resources/css/app.css', // admin page
                'resources/css/front.css', // front page
            ],
            refresh: true,
        }),
    ],
});
