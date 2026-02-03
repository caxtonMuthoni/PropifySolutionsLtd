<template>
    <section id="services" class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-bold text-dark dark:text-light mb-4"
                >
                    Our Services
                </h2>
                <p
                    class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto"
                >
                    Comprehensive web development services to bring your ideas
                    to life
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    v-for="service in services"
                    :key="service.id"
                    class="group relative rounded-2xl border border-slate-200 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg dark:border-slate-700 dark:bg-slate-900"
                >
                    <!-- Icon -->
                    <div
                        class="mb-6 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-700 transition-colors duration-300 group-hover:bg-slate-900 group-hover:text-white dark:bg-slate-800 dark:text-slate-300 dark:group-hover:bg-slate-700"
                    >
                        <component :is="icons[service.icon]" class="h-6 w-6" />
                    </div>

                    <!-- Title -->
                    <h3
                        class="mb-3 text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100"
                    >
                        {{ service.title }}
                    </h3>

                    <!-- Description -->
                    <p
                        class="text-sm leading-relaxed text-slate-600 dark:text-slate-400"
                    >
                        {{ service.description }}
                    </p>

                    <!-- Subtle hover accent -->
                    <span
                        class="pointer-events-none absolute inset-x-0 bottom-0 h-1 rounded-b-2xl bg-slate-900 opacity-0 transition-opacity duration-300 group-hover:opacity-100 dark:bg-slate-700"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { icons } from "@/utils/portifolio_icons";

defineProps({
    services: {
        type: Array,
        required: true,
    },
});
</script>
