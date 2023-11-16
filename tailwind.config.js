/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                roboto: ['"Roboto"', "sans-serif"],
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
