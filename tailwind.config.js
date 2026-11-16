import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './storage/framework/views/*.php',
    ],

    theme: {
        extend: {
            colors: {
                cream: '#F4EEDF',
                paper: '#FBF8F0',
                ink: '#24211B',

                moss: {
                    DEFAULT: '#3E5C3A',
                    dark: '#26391F',
                },

                clay: '#C2582B',
                ochre: '#E0A93B',
                sand: '#E7D8B8',
                sage: '#B5C7A3',
                lake: '#5E8C99',
            },

            fontFamily: {
                sans: [
                    '"Plus Jakarta Sans Variable"',
                    ...defaultTheme.fontFamily.sans,
                ],
                display: [
                    '"Fraunces Variable"',
                    ...defaultTheme.fontFamily.serif,
                ],
            },

            boxShadow: {
                'hard-sm': '2px 2px 0 0 #24211B',
                'hard': '4px 4px 0 0 #24211B',
                'hard-lg': '7px 7px 0 0 #24211B',
            },
        },
    },

    plugins: [],
};