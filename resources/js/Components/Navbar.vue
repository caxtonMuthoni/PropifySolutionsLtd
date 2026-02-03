<template>
    <nav
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        :class="[
            scrolled
                ? 'bg-white/80 dark:bg-dark/80 backdrop-blur-lg shadow-lg'
                : 'bg-transparent',
        ]"
    >
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <ApplicationLogo />

                <!-- Mobile Menu Button -->

                <button
                    @click.stop="toggleMobileMenu"
                    class="md:hidden p-2 rounded-lg text-dark dark:text-light hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200"
                    aria-label="Toggle mobile menu"
                >
                    <svg
                        v-if="!mobileMenuOpen"
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                    <svg
                        v-else
                        class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :href="route(item.route)"
                        class="hover:text-primary-500 dark:hover:text-primary-400 transition-colors duration-200 font-medium"
                        :class="
                            route().current() === item.route
                                ? 'text-primary-500'
                                : 'text-dark dark:text-light'
                        "
                    >
                        {{ item.name }}
                    </Link>
                </div>

                <!-- Desktop CTA & Dark Mode -->
                <div class="hidden md:flex items-center space-x-4">
                    <button
                        @click.stop="toggleDarkMode"
                        class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-dark dark:text-light hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors duration-200"
                        :title="
                            darkMode
                                ? 'Switch to light mode'
                                : 'Switch to dark mode'
                        "
                    >
                        <svg
                            v-if="darkMode"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            v-else
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                            ></path>
                        </svg>
                    </button>

                    <Link
                        :href="route('contact')"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl"
                    >
                        Get a Quote
                    </Link>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div
                v-if="mobileMenuOpen"
                class="md:hidden mt-4 bg-primary-50 dark:bg-slate-800 pb-4 border-t border-gray-200 dark:border-gray-700 pt-4"
            >
                <!-- Navigation Links -->
                <div class="space-y-3">
                    <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :href="route(item.route)"
                        @click="closeMobileMenu"
                        class="block py-2 px-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-200 font-medium"
                        :class="
                            route().current() === item.route
                                ? 'text-primary-500 bg-primary-50 dark:bg-primary-900/20'
                                : 'text-dark dark:text-light'
                        "
                    >
                        {{ item.name }}
                    </Link>
                </div>

                <!-- Mobile Actions -->
                <div
                    class="flex items-center justify-between mt-6 pt-6 border-t border-gray-200 dark:border-gray-700"
                >
                    <!-- Dark Mode Toggle -->
                    <button
                        @click="toggleDarkMode"
                        class="flex items-center space-x-2 p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-dark dark:text-light hover:bg-primary-100 dark:hover:bg-primary-900 transition-colors duration-200"
                        :title="
                            darkMode
                                ? 'Switch to light mode'
                                : 'Switch to dark mode'
                        "
                    >
                        <svg
                            v-if="darkMode"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <svg
                            v-else
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                            ></path>
                        </svg>
                        <span class="font-medium">
                            {{ darkMode ? "Light Mode" : "Dark Mode" }}
                        </span>
                    </button>

                    <!-- Mobile CTA -->
                    <Link
                        :href="route('contact')"
                        @click="closeMobileMenu"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2 rounded-lg font-medium transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl"
                    >
                        Get a Quote
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted, onUnmounted } from "vue";
import ApplicationLogo from "./ApplicationLogo.vue";

const scrolled = ref(false);
const darkMode = ref(false);
const mobileMenuOpen = ref(false);

const navigation = [
    { name: "Home", route: "home" },
    { name: "Services", route: "services" },
    { name: "Portfolio", route: "portfolio" },
    { name: "About", route: "about" },
    { name: "Contact", route: "contact" },
];

const handleScroll = () => {
    scrolled.value = window.scrollY > 50;
};

const toggleMobileMenu = () => {
    mobileMenuOpen.value = !mobileMenuOpen.value;
};

const closeMobileMenu = () => {
    mobileMenuOpen.value = false;
};

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;

    if (darkMode.value) {
        document.documentElement.classList.add("dark");
        localStorage.setItem("darkMode", "true");
    } else {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("darkMode", "false");
    }
};

const initializeDarkMode = () => {
    // Check localStorage first
    let savedMode = null;
    if (typeof window !== "undefined") {
        savedMode = localStorage.getItem("darkMode");
    }

    if (savedMode !== null) {
        // Use saved preference
        darkMode.value = savedMode === "true";
        if (darkMode.value) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    } else {
        // Check system preference if no saved preference
        if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
            darkMode.value = true;
            document.documentElement.classList.add("dark");
            localStorage.setItem("darkMode", "true");
        } else {
            darkMode.value = false;
            document.documentElement.classList.remove("dark");
            localStorage.setItem("darkMode", "false");
        }
    }
};

// Watch for system preference changes (optional)
const watchSystemPreference = () => {
    if (typeof window !== "undefined") {
        const mediaQuery = window.matchMedia("(prefers-color-scheme: dark)");

        const handleChange = (e) => {
            // Only update if user hasn't explicitly set a preference
            if (localStorage.getItem("darkMode") === null) {
                if (e.matches) {
                    darkMode.value = true;
                    document.documentElement.classList.add("dark");
                } else {
                    darkMode.value = false;
                    document.documentElement.classList.remove("dark");
                }
            }
        };

        mediaQuery.addEventListener("change", handleChange);

        // Cleanup function
        return () => mediaQuery.removeEventListener("change", handleChange);
    }
};

// Close mobile menu when clicking outside
const handleClickOutside = (event) => {
    const nav = document.querySelector("nav");
    const mobileMenuButton = document.querySelector(
        '[aria-label="Toggle mobile menu"]',
    );

    if (
        nav &&
        !nav.contains(event.target) &&
        mobileMenuButton &&
        !mobileMenuButton.contains(event.target) &&
        mobileMenuOpen.value
    ) {
        closeMobileMenu();
    }
};

// Close mobile menu on escape key
const handleEscapeKey = (event) => {
    if (event.key === "Escape" && mobileMenuOpen.value) {
        closeMobileMenu();
    }
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
    document.addEventListener("click", handleClickOutside);
    document.addEventListener("keydown", handleEscapeKey);
    initializeDarkMode();
    watchSystemPreference();
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
    document.removeEventListener("click", handleClickOutside);
    document.removeEventListener("keydown", handleEscapeKey);
});
</script>
