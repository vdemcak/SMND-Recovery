/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "smnd-blue": "#427BE9"
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
