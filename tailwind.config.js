const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontFamily: {
            sans: ['Univers', ...defaultTheme.fontFamily.sans],
            serif: ['Glypha'],
            condensed: ['UniversCondensed', 'sans-serif']
        },
        colors: {
            black: '#000',
            white: '#fff',
            gray:{
                100: '#e5e5e5',
                200: '#cccccc',
                300: '#b2b2b2',
                400: '#999999',
                500: '#808080',
                600: '#666666',
                700: '#4d4d4d',
                800: '#333333',
                900: '1a1a1a',
                default: '#cccccc'
            },
            red: {
                100: '#ea1500',
                200: '#cc0000',
                300: '#b40000',
                400: '#990000',
                500: '#7e0000',
                600: '#5e0000',
                700: '#3e0000',
                default: '#cc0000'
            },
            reynolds: "#990000",
            orange: {
                100: '#f8a812',
                200: '#f28c0d',
                300: '#e16408',
                400: '#d14905',
                500: '#c03003',
                600: '#a91b02',
                700: '#910e01',
                default: '#d14905'
            },
            yellow: {
                100: '#fef8cb',
                200: '#fde565',
                300: '#f8da3e',
                400: '#fac800',
                500: '#d7a700',
                600: '#b88800',
                700: '#966d00',
                default: '#fac800'
            },
            green: {
                100: '#bfcc46',
                200: '#a2b729',
                300: '#d89e2b',
                400: '#6f7d1c',
                500: '#586800',
                600: '#424c08',
                700: '#2f3a03',
                default: '#6f7d1c'
            },
            aqua: {
                100: '#91f2cb',
                200: '#57dab1',
                300: '#2db597',
                400: '#008473',
                500: '#00716d',
                600: '#005b5f',
                700: '#00444c',
                default: '#008473'
            },
            blue: {
                100: '#80c3d4',
                200: '#6fb2c5',
                300: '#599baf',
                400: '#427e93',
                500: '#2d637a',
                600: '#1d4b61',
                700: '#12394d',
                default: '#427e93'
            },
            indigo:{
                100: '#84a0dc',
                200: '#728bdf',
                300: '#5b73bb',
                400: '#4156a1',
                500: '#344891',
                600: '#24347b',
                700: '#192668',
                default: '#4156a1'
            },
        },
        extend: {

        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui', '@tailwindcss/custom-forms')],
};
