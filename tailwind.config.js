/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui"), require("tailwind-scrollbar-hide")],
    daisyui: {
        themes: [
            {
                light: {
                    ...require("daisyui/src/theming/themes")["light"],
                    primary: "#F5365C",
                    "primary-content": "#fff",
                },
            },
            {
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],
                    primary: "#F5365C",
                    "primary-content": "#fff",
                },
            },
        ],
    },
};
