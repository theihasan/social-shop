import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/vendor/social-shop/app.js'],
            refresh: true,
            buildDirectory: 'build/social-shop'
        }),
        vue(),
    ],
})