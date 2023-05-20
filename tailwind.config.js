const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./Modules/**/resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                brand: {
                    purple: {
                        100: "#E1D5F9",
                        200: "#C3AAF3",
                        300: "#A580EE",
                        400: "#8755E8",
                        500: "#692BE2",
                        600: "#5422B5",
                        700: "#3F1A88",
                        800: "#2A115A",
                        900: "#15092D",
                    },
                    yellow: {
                        100: "#F9F2D5",
                        200: "#F3E5AA",
                        300: "#EED980",
                        400: "#E8CC55",
                        500: "#E2BF2B",
                        600: "#B59922",
                        700: "#88731A",
                        800: "#5A4C11",
                        900: "#2D2609",
                    },
                    pink: "#9E1E9C",
                },
            },
        },
        screens: {
            xs: "475px",
            ...defaultTheme.screens,
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                md: "3rem",
                lg: "4rem",
                xl: "5rem",
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
