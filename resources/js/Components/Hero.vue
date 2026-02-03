<template>
    <section
        class="relative min-h-screen flex items-center justify-center overflow-hidden"
    >
        <!-- Background Gradient -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-dark dark:via-dark dark:to-gray-900"
        ></div>

        <!-- Animated Background Elements -->
        <div
            class="absolute top-20 left-10 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"
        ></div>
        <div
            class="absolute top-40 right-10 w-72 h-72 bg-secondary-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"
            style="animation-delay: 2s"
        ></div>
        <div
            class="absolute bottom-20 left-1/3 w-72 h-72 bg-primary-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"
            style="animation-delay: 4s"
        ></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1
                    class="text-5xl md:text-7xl font-bold text-dark dark:text-light mb-6 animate-fade-in"
                >
                    We Design & Build
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 to-secondary-500"
                    >
                        Scalable Web Applications
                    </span>
                    for Growing Businesses.
                </h1>

                <p
                    class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-12 animate-slide-up"
                >
                    Secure, high-performance software solutions engineered for
                    long-term growth.
                </p>

                <div
                    class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up"
                    style="animation-delay: 0.2s"
                >
                    <a
                        :href="route('contact')"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl"
                    >
                        Get a Quote
                    </a>
                    <a
                        href="#portfolio"
                        class="border-2 border-dark dark:border-light text-dark dark:text-light hover:bg-dark hover:text-light dark:hover:bg-light dark:hover:text-dark px-8 py-4 rounded-lg font-semibold text-lg transition-all duration-200 transform hover:scale-105"
                    >
                        View Our Work
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div
            class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce"
        >
            <div
                class="w-6 h-10 border-2 border-dark dark:border-light rounded-full flex justify-center"
            >
                <div
                    class="w-1 h-3 bg-dark dark:bg-light rounded-full mt-2"
                ></div>
            </div>
        </div>
    </section>
</template>

<script setup></script>
