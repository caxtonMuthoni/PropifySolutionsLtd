<template>
    <section
        class="relative py-20 md:py-28 overflow-hidden bg-gradient-to-r from-primary-500 to-secondary-500 dark:from-primary-700 dark:to-secondary-800"
    >
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Grid pattern overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-br from-white/10 via-transparent to-transparent dark:from-white/5 dark:via-transparent dark:to-transparent"
            ></div>

            <!-- Animated circles -->
            <div
                class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-white/10 dark:bg-white/5 blur-3xl animate-pulse"
            ></div>
            <div
                class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-white/10 dark:bg-white/5 blur-3xl animate-pulse delay-1000"
            ></div>
            <div
                class="absolute top-1/3 right-1/4 w-48 h-48 rounded-full bg-white/10 dark:bg-white/5 blur-3xl animate-pulse delay-500"
            ></div>
        </div>

        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="max-w-6xl mx-auto">
                <!-- Decorative top line -->
                <div class="flex justify-center mb-8">
                    <div
                        class="w-24 h-1 bg-gradient-to-r from-white/30 via-white to-white/30 rounded-full"
                    ></div>
                </div>

                <!-- Main Content - Full width, no card -->
                <div class="text-center">
                    <!-- Header -->
                    <div class="mb-10">
                        <h2
                            class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight"
                        >
                            Ready to Elevate Your
                            <span
                                class="bg-gradient-to-r from-white to-primary-100 dark:from-primary-200 dark:to-secondary-200 bg-clip-text text-transparent"
                            >
                                Digital Presence?
                            </span>
                        </h2>
                        <p
                            class="text-xl md:text-2xl text-white/90 dark:text-primary-100 mb-8 max-w-3xl mx-auto leading-relaxed"
                        >
                            Let's discuss your project and create a custom
                            solution that drives results. Get a detailed service
                            quote within 24 hours.
                        </p>
                    </div>

                    <!-- Key Benefits - Three Column Layout -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 max-w-5xl mx-auto"
                    >
                        <div
                            class="text-center p-6 bg-white/10 dark:bg-white/5 backdrop-blur-sm rounded-2xl border border-white/20 dark:border-white/10"
                        >
                            <div
                                class="w-16 h-16 mx-auto mb-4 bg-white/20 dark:bg-white/10 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">
                                Fast Turnaround
                            </h3>
                            <p class="text-white/80 dark:text-primary-100">
                                Get your quote within 24 hours
                            </p>
                        </div>

                        <div
                            class="text-center p-6 bg-white/10 dark:bg-white/5 backdrop-blur-sm rounded-2xl border border-white/20 dark:border-white/10"
                        >
                            <div
                                class="w-16 h-16 mx-auto mb-4 bg-white/20 dark:bg-white/10 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">
                                Expert Consultation
                            </h3>
                            <p class="text-white/80 dark:text-primary-100">
                                Free technical assessment of your project
                            </p>
                        </div>

                        <div
                            class="text-center p-6 bg-white/10 dark:bg-white/5 backdrop-blur-sm rounded-2xl border border-white/20 dark:border-white/10"
                        >
                            <div
                                class="w-16 h-16 mx-auto mb-4 bg-white/20 dark:bg-white/10 rounded-full flex items-center justify-center"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    ></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">
                                Tailored Solutions
                            </h3>
                            <p class="text-white/80 dark:text-primary-100">
                                Customized proposals for your specific needs
                            </p>
                        </div>
                    </div>

                    <!-- Primary CTA Buttons -->
                    <div
                        class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-10"
                    >
                        <Link
                            :href="route('contact')"
                            class="group bg-white hover:bg-gray-50 text-primary-600 dark:text-gray-800 px-10 py-5 rounded-2xl font-semibold text-xl transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-3xl flex items-center space-x-4 w-full sm:w-auto justify-center max-w-xs sm:max-w-none"
                        >
                            <span class="font-bold"
                                >Get Your Service Quote</span
                            >
                            <svg
                                class="w-6 h-6 group-hover:translate-x-2 transition-transform duration-300"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"
                                ></path>
                            </svg>
                        </Link>

                        <div
                            class="flex items-center space-x-2 text-white/90 dark:text-primary-100"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                ></path>
                            </svg>
                            <span class="text-sm font-medium"
                                >No commitment required</span
                            >
                        </div>
                    </div>

                    <!-- Stats Banner -->
                    <div
                        class="bg-white/10 dark:bg-white/5 backdrop-blur-sm rounded-2xl p-6 md:p-8 border border-white/20 dark:border-white/10 max-w-4xl mx-auto"
                    >
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-white mb-1"
                                >
                                    150+
                                </div>
                                <div
                                    class="text-sm text-white/80 dark:text-primary-100"
                                >
                                    Projects Delivered
                                </div>
                            </div>
                            <div class="text-center">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-white mb-1"
                                >
                                    98%
                                </div>
                                <div
                                    class="text-sm text-white/80 dark:text-primary-100"
                                >
                                    Client Satisfaction
                                </div>
                            </div>
                            <div class="text-center">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-white mb-1"
                                >
                                    40+
                                </div>
                                <div
                                    class="text-sm text-white/80 dark:text-primary-100"
                                >
                                    Happy Clients
                                </div>
                            </div>
                            <div class="text-center">
                                <div
                                    class="text-3xl md:text-4xl font-bold text-white mb-1"
                                >
                                    24h
                                </div>
                                <div
                                    class="text-sm text-white/80 dark:text-primary-100"
                                >
                                    Avg. Response
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div
                        class="mt-12 pt-8 border-t border-white/20 dark:border-white/10"
                    >
                        <p
                            class="text-white/70 dark:text-primary-100 text-sm uppercase tracking-wider mb-6"
                        >
                            Trusted by Industry Leaders
                        </p>
                        <!-- Placeholder for client logos - Replace with actual logos -->
                        <div
                            class="flex flex-wrap justify-center items-center gap-8 md:gap-12 opacity-70"
                        >
                            <div class="w-28 h-auto bg-white rounded p-2">
                                <img
                                    src="/images/companies/do.png"
                                    class="h-full w-full object-contain"
                                />
                            </div>
                            <div class="w-28 h-auto bg-white p-2 rounded">
                                <img
                                    src="/images/companies/mpesa.png"
                                    class="h-full w-full object-contain"
                                />
                            </div>
                            <div class="w-28 h-auto bg-white p-2 rounded">
                                <img
                                    src="/images/companies/aft.png"
                                    class="h-full w-full object-contain"
                                />
                            </div>
                            <div class="w-28 h-auto bg-white p-2 rounded">
                                <img
                                    src="/images/companies/hostafrica.svg"
                                    class="h-full w-full object-contain"
                                />
                            </div>
                            <div
                                class="w-28 h-auto bg-white/90 p-2 dark:bg-white/10 rounded"
                            >
                                <img
                                    src="/images/companies/mailjet.png"
                                    class="w-full object-contain"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom decorative wave -->
        <div
            class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white/5 to-transparent"
        ></div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style scoped>
/* Smooth animation for background elements */
@keyframes subtle-pulse {
    0%,
    100% {
        opacity: 0.3;
    }
    50% {
        opacity: 0.6;
    }
}

.animate-pulse {
    animation: subtle-pulse 3s ease-in-out infinite;
}

/* Ensure good contrast in both modes */
@media (prefers-color-scheme: light) {
    section {
        --text-color: rgba(255, 255, 255, 0.95);
    }
}

@media (prefers-color-scheme: dark) {
    section {
        --text-color: rgba(255, 255, 255, 0.95);
    }
}
</style>
