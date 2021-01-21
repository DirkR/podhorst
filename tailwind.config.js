const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            // Build your palette here
            red: colors.red,
            blue: colors.blue,
            green: colors.green,
            orange: colors.orange,
            white: colors.white,
            black: colors.black,
            yellow: colors.yellow,
            transparent: colors.transparent,
            indigo: colors.indigo,
            amber: colors.amber,
            gray: colors.trueGray,
            lightblue: colors.lightBlue,
            bluegray: colors.blueGray,
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
};
