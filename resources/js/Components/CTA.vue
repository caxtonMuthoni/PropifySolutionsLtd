<template>
    <section class="py-20 bg-gradient-to-r from-primary-500 to-secondary-500">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Build Your Next Big Idea?
            </h2>
            <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
                Let's discuss your project and create something amazing
                together.
            </p>
            <Link
                :href="route('contact')"
                class="inline-block bg-white text-primary-500 hover:bg-gray-100 px-8 py-4 rounded-lg font-semibold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl"
            >
                Get a Quote
            </Link>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
