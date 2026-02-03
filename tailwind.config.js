import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#eef6ff",
                    100: "#d8eaff",
                    200: "#b1d4ff",
                    300: "#7dbaff",
                    400: "#4b9dff",
                    500: "#1f75ff",
                    600: "#175ddb",
                    700: "#144db3",
                    800: "#113f8c",
                    900: "#0d326f",
                },
                secondary: {
                    50: "#f5f8ff",
                    100: "#e5edff",
                    200: "#c7d5ff",
                    300: "#9fb8ff",
                    400: "#7293ff",
                    500: "#4c6fff",
                    600: "#3757db",
                    700: "#2c47b3",
                    800: "#253b8c",
                    900: "#1d2f70",
                },
                dark: "#0f172a",
                light: "#f9fafb",
                success: "#16a34a",
                warning: "#f59e0b",
                danger: "#dc2626",
            },
            animation: {
                "fade-in": "fadeIn 0.5s ease-in-out",
                "slide-up": "slideUp 0.5s ease-out",
                float: "float 6s ease-in-out infinite",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                slideUp: {
                    "0%": { transform: "translateY(20px)", opacity: "0" },
                    "100%": { transform: "translateY(0)", opacity: "1" },
                },
                float: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-20px)" },
                },
            },
        },
    },

    plugins: [forms],
};
