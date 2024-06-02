/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{vue,html,jsx,ts,tsx,js}", "./index.html"],
    theme: {
        extend: {
            fontFamily: {
                'inter': ['Inter'],
                'poppins': ['Poppins'],
                'roboto': ['Roboto'],
                'rubik': ['Rubik'],
            }
        },
    },
    plugins: [],
}
