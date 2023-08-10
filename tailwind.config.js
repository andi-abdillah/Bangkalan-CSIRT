/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        fontSize: {
            sm: "0.8rem",
            base: "1rem",
            lg: "1.125rem",
            xl: "1.25rem",
            "2xl": "1.563rem",
            "3xl": "1.953rem",
            "4xl": "2.441rem",
            "5xl": "3.052rem",
            "6xl": "3.75rem",
            footer: "1.15rem",
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ["light", "dark", "night"],
    },
};
