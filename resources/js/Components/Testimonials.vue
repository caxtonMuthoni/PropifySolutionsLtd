<template>
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2
                    class="text-4xl md:text-5xl font-bold text-dark dark:text-light mb-4"
                >
                    What Our Clients Say
                </h2>
                <p
                    class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto"
                >
                    Don't just take our word for it - hear from some of our
                    satisfied clients
                </p>
            </div>

            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto"
            >
                <div
                    v-for="testimonial in testimonials"
                    :key="testimonial.id"
                    class="bg-light dark:bg-gray-800 p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700"
                >
                    <!-- Stars -->
                    <div class="flex mb-4">
                        <span
                            v-for="star in 5"
                            :key="star"
                            class="text-yellow-400 text-lg"
                        >
                            ⭐
                        </span>
                    </div>

                    <p
                        class="text-gray-600 dark:text-gray-300 text-lg mb-6 italic"
                    >
                        "{{ testimonial.content }}"
                    </p>

                    <div>
                        <p class="font-semibold text-dark dark:text-light">
                            {{ testimonial.name }}
                        </p>
                        <p class="text-primary-500">
                            {{ testimonial.company }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    testimonials: {
        type: Array,
        required: true,
    },
});
</script>
