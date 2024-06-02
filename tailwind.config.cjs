/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.{vue,html,jsx,ts,tsx,js}"],
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
