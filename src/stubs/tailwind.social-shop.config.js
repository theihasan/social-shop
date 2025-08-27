/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/js/vendor/social-shop/**/*.{vue,js}',
        './resources/views/vendor/social-shop/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'meta-blue': '#1877F2',
                'meta-blue-dark': '#166FE5',
                'meta-blue-light': '#E7F3FF'
            },
            fontFamily: {
                'inter': ['Inter', 'sans-serif']
            }
        },
    },
    plugins: [],
}