// tailwind.config.js

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php', // <-- BARIS INI PALING PENTING
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                'sienna': {
                   '50': '#fdf8f5',
                   '100': '#fbece2',
                   '200': '#f6d8c4',
                   '300': '#f0c4a7',
                   '400': '#eab089',
                   '500': '#e59c6c',
                   '600': '#A0522D', // Warna utama
                   '700': '#9b4e2a',
                   '800': '#7c3e22',
                   '900': '#63321b'
                }
            }
        },
    },

    plugins: [forms],
};