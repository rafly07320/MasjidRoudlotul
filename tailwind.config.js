import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'remas': "url('/public/images/remas.jpg')",
                'ngaji': "url('/public/images/ngaji.jpg')",
                'pattern': "url('/public/images/45-degree-fabric-light.png')",
                'arab': "url('/public/images/arabesque.png')",
                'twill': "url('/public/images/crossword.png')",
                'kotak': "url('/public/images/batthern.png')",
                'brush': "url('/public/images/brushed-alum-dark.png')",
                'striped-brick': "url('/public/images/diagonal-striped-brick.png')",
            },
            height: {
                'custom-1': '450px',
                'custom-2': '600px',
            },
        },
    },

    plugins: [forms,require('flowbite/plugin'),
        
    ],
};
