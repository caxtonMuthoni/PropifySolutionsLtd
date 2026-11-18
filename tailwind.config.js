import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./app/Livewire/**/*.php",
        "./app/Services/Content/**/*.php",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Instrument Sans"', "Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#eef5ff",
                    100: "#d9e8ff",
                    200: "#bcd7ff",
                    300: "#8ebdff",
                    400: "#5998ff",
                    500: "#3375ff",
                    600: "#1f5ff0",
                    700: "#164bd6",
                    800: "#183eab",
                    900: "#1a3986",
                    950: "#142451",
                },
                accent: {
                    300: "#a5ecff",
                    400: "#7de3ff",
                    500: "#38c8f0",
                },
                ink: {
                    700: "#1b2747",
                    800: "#111b36",
                    900: "#0b1530",
                    950: "#060d1f",
                },
                dark: "#0b1530",
                light: "#f9fafb",
                success: "#16a34a",
                warning: "#f59e0b",
                danger: "#dc2626",
            },
            boxShadow: {
                soft: "0 1px 2px rgba(15, 23, 42, 0.04), 0 8px 24px -12px rgba(15, 23, 42, 0.12)",
                glow: "0 20px 60px -20px rgba(31, 95, 240, 0.55)",
            },
            backgroundImage: {
                "topo-light": "url('../images/patterns/topo-light.svg')",
                "topo-dark": "url('../images/patterns/topo-dark.svg')",
                rings: "url('../images/patterns/rings.svg')",
                "dots-light": "radial-gradient(rgba(255,255,255,0.18) 1px, transparent 1px)",
            },
            animation: {
                "fade-in": "fadeIn 0.5s ease-in-out",
                "slide-up": "slideUp 0.6s ease-out both",
                float: "float 6s ease-in-out infinite",
                "spin-slow": "spin 28s linear infinite",
                marquee: "marquee 30s linear infinite",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0" },
                    "100%": { opacity: "1" },
                },
                slideUp: {
                    "0%": { transform: "translateY(16px)", opacity: "0" },
                    "100%": { transform: "translateY(0)", opacity: "1" },
                },
                float: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-12px)" },
                },
                marquee: {
                    "0%": { transform: "translateX(0)" },
                    "100%": { transform: "translateX(-50%)" },
                },
            },
        },
    },

    plugins: [forms],
};
