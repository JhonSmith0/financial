import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import { fileURLToPath, URL } from 'node:url'

import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/main.ts'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./resources/js', import.meta.url))
        }
    }
});
