<template>
    <section id="portfolio" class="py-20 bg-gray-50 dark:bg-dark">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-bold text-dark dark:text-light mb-4"
                >
                    Our Portfolio
                </h2>
                <p
                    class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto"
                >
                    Some of our recent projects that showcase our expertise
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="project in portfolio"
                    :key="project.id"
                    class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden transition-all duration-300 transform hover:-translate-y-2"
                >
                    <!-- Project Image Placeholder -->
                    <div
                        class="h-48 bg-gradient-to-r from-primary-500 to-secondary-500 relative overflow-hidden"
                    >
                        <div
                            class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex items-center justify-center"
                        >
                            <img
                                :src="project.image_url"
                                v-if="project.image_url"
                                class="w-full h-full object-cover object-top"
                            />
                        </div>
                    </div>

                    <div class="p-6">
                        <span class="text-primary-500 text-sm font-medium">
                            {{ project.category }}
                        </span>
                        <h3
                            class="text-xl font-bold text-dark dark:text-light mb-2"
                        >
                            {{ project.title }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ project.description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    portfolio: {
        type: Array,
        required: true,
    },
});
</script>
