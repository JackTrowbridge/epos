/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'secondary': '#545454',
                'primary': '#FFFFFF',
                'window-glass': '#808080'
            }
        },
    },
    plugins: [],
}

