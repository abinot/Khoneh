import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Vazirmatn', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                sopal: {
                    '50': '#E8F6F4',
                    '100': '#B7E1DC',
                    '200': '#8CD0C9',
                    '300': '#5BB8AE',
                    '400': '#2A9D8F',
                    '500': '#176B6A',
                    '600': '#0D3D46',
                    '700': '#0A2E34',
                    '800': '#071F23',
                    '900': '#041012',
                },
            },
            animation: {
                'gradient': 'gradient 8s ease infinite',
                'fade-in': 'fadeIn 1s ease-out forwards',
                'slide-up': 'slideUp 0.6s ease-out forwards',
                'counter': 'counter 2s ease-out forwards',
            },
            keyframes: {
                gradient: {
                    '0%, 100%': {
                        'background-position': '0% 50%',
                    },
                    '50%': {
                        'background-position': '100% 50%',
                    },
                },
                fadeIn: {
                    '0%': {
                        opacity: '0',
                    },
                    '100%': {
                        opacity: '1',
                    },
                },
                slideUp: {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
            },
            backgroundSize: {
                '300%': '300%',
            },
        },
    },

    plugins: [forms],
};
