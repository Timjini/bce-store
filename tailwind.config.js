import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],

    theme: {
        extend: {
            colors: {
                'bce-blue': '#003366',
                'bce-light-blue': '#0066cc',
                'bce-steel': '#4d4d4d',
                'bce-accent': '#ff6600',
            },
            fontFamily: {
                sans: ['Montserrat', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
