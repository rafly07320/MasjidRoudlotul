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
                'masjid': "url('/public/images/masjid.jpg')",
                'black-linen': "url('/public/images/black-linen.png')",

            },
            height: {
                'custom-1': '450px',
                'custom-2': '600px',
                'custom-3': '800px',
                'custom-4': '1000px',
                'custom-5': '1200px',
                'custom-6': '1400px',
                'custom-7': '1600px',
                'custom-8': '1800px',
                'custom-9': '2000px',
                'custom-10': '2200px',
                'custom-11': '2400px',
                'custom-12': '2600px',
                'custom-13': '2800px',
                'custom-14': '3000px',
                'custom-15': '3200px',
                'custom-16': '3400px',
                'custom-17': '3600px',
                'custom-18': '3800px',
                'custom-19': '4000px',
                'custom-20': '4200px',
                'custom-21': '4400px',
            },
            boxShadow: {
                'inner-lg': 'inset 0 0 15px 0px rgba(0, 0, 0, 0.6)', // Custom inner shadow
                'outer-lg': '10px 10px 0 rgba(0, 0, 0, 0.5)',
            },
            fontFamily: {
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms,
        require('flowbite/plugin')({
        datatables: true,
    }), 
    ],
};
