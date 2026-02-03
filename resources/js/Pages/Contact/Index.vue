<template>
    <AppLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 bg-light dark:bg-dark">
            <FlashMessage />
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h1
                        class="text-5xl md:text-6xl font-bold text-dark dark:text-light mb-6"
                    >
                        Get In Touch
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                        Ready to start your project? We'd love to hear from you.
                        Send us a message and we'll respond as soon as possible.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-7xl mx-auto"
                >
                    <!-- Location & Information -->
                    <div class="space-y-8 order-2 md:order-1">
                        <div>
                            <h2
                                class="text-3xl font-bold text-dark dark:text-light mb-4"
                            >
                                Visit Our Office
                            </h2>
                            <p class="text-lg text-gray-600 dark:text-gray-300">
                                Located in the heart of Westlands, our office is
                                easily accessible for meetings and
                                consultations. Feel free to visit us during
                                office hours.
                            </p>
                        </div>

                        <!-- Location Details -->
                        <div class="space-y-6">
                            <h3
                                class="text-xl font-semibold text-dark dark:text-light"
                            >
                                Our Location
                            </h3>

                            <div class="space-y-4">
                                <!-- Address -->
                                <div
                                    class="flex items-start p-4 bg-light dark:bg-gray-800 rounded-xl"
                                >
                                    <div
                                        class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                    >
                                        <svg
                                            class="w-6 h-6 text-primary-600 dark:text-primary-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm text-gray-500 dark:text-gray-400 mb-1"
                                        >
                                            Address
                                        </p>
                                        <p
                                            class="text-lg font-medium text-dark dark:text-light"
                                        >
                                            Westlands Business Centre<br />
                                            4th Floor, Suite 405<br />
                                            Westlands Road, Nairobi
                                        </p>
                                    </div>
                                </div>

                                <!-- Office Hours -->
                                <div
                                    class="p-4 bg-light dark:bg-gray-800 rounded-xl"
                                >
                                    <div class="flex items-center mb-4">
                                        <div
                                            class="w-12 h-12 bg-secondary-100 dark:bg-secondary-900 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                        >
                                            <svg
                                                class="w-6 h-6 text-secondary-600 dark:text-secondary-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                />
                                            </svg>
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm text-gray-500 dark:text-gray-400"
                                            >
                                                Office Hours
                                            </p>
                                            <p
                                                class="text-lg font-medium text-dark dark:text-light"
                                            >
                                                Monday - Friday: 8:00 AM - 6:00
                                                PM
                                            </p>
                                        </div>
                                    </div>

                                    <div class="space-y-3 mt-4">
                                        <div
                                            v-for="(
                                                hours, day
                                            ) in contactInfo.officeHours"
                                            :key="day"
                                            class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-gray-700 last:border-b-0"
                                        >
                                            <span
                                                class="text-gray-600 dark:text-gray-300 font-medium"
                                                >{{ day }}</span
                                            >
                                            <span
                                                class="text-dark dark:text-light font-semibold"
                                                >{{ hours }}</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <!-- Parking & Accessibility -->
                                <div
                                    class="flex items-start p-4 bg-light dark:bg-gray-800 rounded-xl"
                                >
                                    <div
                                        class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                    >
                                        <svg
                                            class="w-6 h-6 text-primary-600 dark:text-primary-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="text-sm text-gray-500 dark:text-gray-400 mb-1"
                                        >
                                            Parking & Accessibility
                                        </p>
                                        <p
                                            class="text-gray-600 dark:text-gray-300"
                                        >
                                            • Secure underground parking
                                            available<br />
                                            • Wheelchair accessible<br />
                                            • Visitor parking on request
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Map Section -->
                        <div class="space-y-4">
                            <h3
                                class="text-xl font-semibold text-dark dark:text-light"
                            >
                                Find Us on Map
                            </h3>
                            <div
                                class="bg-gray-100 dark:bg-gray-800 rounded-2xl overflow-hidden h-64 relative"
                            >
                                <!-- Map Placeholder - Replace with actual map integration -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-primary-100 to-secondary-100 dark:from-gray-700 dark:to-gray-800"
                                >
                                    <div class="text-center p-8">
                                        <div
                                            class="w-16 h-16 mx-auto mb-4 bg-white dark:bg-gray-800 rounded-full flex items-center justify-center shadow-lg"
                                        >
                                            <svg
                                                class="w-8 h-8 text-primary-500"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                />
                                            </svg>
                                        </div>
                                        <p
                                            class="text-gray-700 dark:text-gray-300 font-medium mb-2"
                                        >
                                            Westlands Business Centre
                                        </p>
                                        <p
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            Westlands Road, Nairobi
                                        </p>
                                    </div>
                                </div>

                                <!-- Map overlay with directions button -->
                                <div class="absolute bottom-4 right-4">
                                    <a
                                        href="https://maps.google.com/?q=Westlands+Business+Centre+Nairobi"
                                        target="_blank"
                                        class="bg-white dark:bg-gray-800 text-primary-600 dark:text-primary-400 px-4 py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 inline-flex items-center font-medium"
                                    >
                                        <svg
                                            class="w-4 h-4 mr-2"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                            />
                                        </svg>
                                        Get Directions
                                    </a>
                                </div>
                            </div>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Note: For in-person meetings, please schedule an
                                appointment in advance.
                            </p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div
                        class="bg-light dark:bg-gray-800 rounded-2xl p-8 shadow-lg order-1 md:order-2"
                    >
                        <div class="mb-8">
                            <h3
                                class="text-2xl font-bold text-dark dark:text-light mb-4"
                            >
                                Send us a Message
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300">
                                Fill out the form below and we'll get back to
                                you within 24 hours. For urgent inquiries,
                                please include your phone number.
                            </p>
                        </div>

                        <!-- Success Message -->
                        <div
                            v-if="$page.props.flash?.success"
                            class="mb-6 p-4 bg-success/20 border border-success/30 rounded-lg text-success dark:text-success-300"
                        >
                            {{ $page.props.flash?.success }}
                        </div>

                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Name -->
                            <div>
                                <label
                                    for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Full Name *
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    v-model="form.name"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    placeholder="Your full name"
                                />
                                <p
                                    v-if="errors.name"
                                    class="mt-1 text-sm text-danger"
                                >
                                    {{ errors.name }}
                                </p>
                            </div>

                            <!-- Email -->
                            <div>
                                <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Email Address *
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    v-model="form.email"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    placeholder="your.email@example.com"
                                />
                                <p
                                    v-if="errors.email"
                                    class="mt-1 text-sm text-danger"
                                >
                                    {{ errors.email }}
                                </p>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label
                                    for="phone"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Your Phone Number *
                                </label>
                                <input
                                    type="text"
                                    id="phone"
                                    v-model="form.phone"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200"
                                    placeholder="Your phone number "
                                />
                                <p
                                    v-if="errors.phone"
                                    class="mt-1 text-sm text-danger"
                                >
                                    {{ errors.phone }}
                                </p>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label
                                    for="subject"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Project Type *
                                </label>
                                <select
                                    id="subject"
                                    v-model="form.subject"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200"
                                >
                                    <option value="">
                                        Select project type
                                    </option>
                                    <option value="web-development">
                                        Web Development
                                    </option>
                                    <option value="saas-platform">
                                        SaaS Platform
                                    </option>
                                    <option value="api-integration">
                                        API Integration
                                    </option>
                                    <option value="mobile-app">
                                        Mobile Application
                                    </option>
                                    <option value="maintenance">
                                        Maintenance & Support
                                    </option>
                                    <option value="consultation">
                                        Consultation
                                    </option>
                                    <option value="other">Other</option>
                                </select>
                                <p
                                    v-if="errors.subject"
                                    class="mt-1 text-sm text-danger"
                                >
                                    {{ errors.subject }}
                                </p>
                            </div>

                            <!-- Timeline -->
                            <div>
                                <label
                                    for="timeline"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Project Timeline
                                </label>
                                <select
                                    id="timeline"
                                    v-model="form.timeline"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200"
                                >
                                    <option value="">
                                        Select preferred timeline
                                    </option>
                                    <option value="urgent">
                                        Urgent (Within 1 month)
                                    </option>
                                    <option value="1-3months">
                                        1-3 Months
                                    </option>
                                    <option value="3-6months">
                                        3-6 Months
                                    </option>
                                    <option value="flexible">
                                        Flexible / Planning Phase
                                    </option>
                                    <option value="not-sure">
                                        Not Sure Yet
                                    </option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div>
                                <label
                                    for="message"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Project Details *
                                </label>
                                <textarea
                                    id="message"
                                    v-model="form.message"
                                    required
                                    rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none"
                                    placeholder="Tell us about your project, goals, requirements, and any specific needs..."
                                ></textarea>
                                <p
                                    v-if="errors.message"
                                    class="mt-1 text-sm text-danger"
                                >
                                    {{ errors.message }}
                                </p>
                            </div>

                            <!-- Budget (Optional) -->
                            <div>
                                <label
                                    for="budget"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"
                                >
                                    Estimated Budget (Optional)
                                </label>
                                <select
                                    id="budget"
                                    v-model="form.budget"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-all duration-200"
                                >
                                    <option value="">
                                        Select budget range
                                    </option>
                                    <option value="under-5k">
                                        Under $5,000
                                    </option>
                                    <option value="5k-15k">
                                        $5,000 - $15,000
                                    </option>
                                    <option value="15k-50k">
                                        $15,000 - $50,000
                                    </option>
                                    <option value="50k-plus">$50,000+</option>
                                    <option value="not-sure">
                                        Need a quote
                                    </option>
                                    <option value="confidential">
                                        Confidential
                                    </option>
                                </select>
                            </div>

                            <!-- Preferred Contact Method -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3"
                                >
                                    Preferred Contact Method
                                </label>
                                <div class="flex flex-wrap gap-4">
                                    <label class="inline-flex items-center">
                                        <input
                                            type="radio"
                                            v-model="form.preferred_contact"
                                            value="email"
                                            class="text-primary-500 focus:ring-primary-500"
                                        />
                                        <span
                                            class="ml-2 text-gray-700 dark:text-gray-300"
                                            >Email</span
                                        >
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="radio"
                                            v-model="form.preferred_contact"
                                            value="phone"
                                            class="text-primary-500 focus:ring-primary-500"
                                        />
                                        <span
                                            class="ml-2 text-gray-700 dark:text-gray-300"
                                            >Phone Call</span
                                        >
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="radio"
                                            v-model="form.preferred_contact"
                                            value="meeting"
                                            class="text-primary-500 focus:ring-primary-500"
                                        />
                                        <span
                                            class="ml-2 text-gray-700 dark:text-gray-300"
                                            >In-person Meeting</span
                                        >
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="radio"
                                            v-model="form.preferred_contact"
                                            value="video"
                                            class="text-primary-500 focus:ring-primary-500"
                                        />
                                        <span
                                            class="ml-2 text-gray-700 dark:text-gray-300"
                                            >Video Call</span
                                        >
                                    </label>
                                </div>

                                <div
                                    class="w-full flex flex-col items-center gap-2 mt-4"
                                >
                                    <vue-turnstile
                                        :site-key="turnstile_site_key"
                                        v-model="form.token"
                                        :theme="currentTheme"
                                    />
                                    <p
                                        v-if="errors.token"
                                        class="mt-2 text-sm text-red-600 dark:text-red-400 text-center"
                                    >
                                        {{ errors.token }}
                                    </p>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                :disabled="
                                    processing || form.processing || !form.token
                                "
                                class="w-full bg-primary-500 hover:bg-primary-600 disabled:bg-primary-300 text-white font-semibold py-4 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 disabled:scale-100 disabled:cursor-not-allowed shadow-lg hover:shadow-xl"
                            >
                                <span v-if="!processing || form.processing"
                                    >Send Message</span
                                >
                                <span
                                    v-else
                                    class="flex items-center justify-center"
                                >
                                    <svg
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                    >
                                        <circle
                                            class="opacity-25"
                                            cx="12"
                                            cy="12"
                                            r="10"
                                            stroke="currentColor"
                                            stroke-width="4"
                                        ></circle>
                                        <path
                                            class="opacity-75"
                                            fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                        ></path>
                                    </svg>
                                    Sending...
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional CTA Section -->
        <section class="py-16 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-dark dark:text-light mb-4">
                    Prefer an In-person Meeting?
                </h2>
                <p
                    class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto"
                >
                    Visit our Westlands office for a free consultation. We'll
                    discuss your project requirements in detail over coffee.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                        href="#"
                        @click.prevent="scrollToForm"
                        class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105"
                    >
                        Schedule Meeting
                    </a>
                    <a
                        href="https://maps.google.com/?q=Westlands+Business+Centre+Nairobi"
                        target="_blank"
                        class="border-2 border-dark dark:border-light text-dark dark:text-light hover:bg-dark hover:text-light dark:hover:bg-light dark:hover:text-dark px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105"
                    >
                        Get Directions
                    </a>
                </div>
            </div>
        </section>
    </AppLayout>
</template>

<script setup>
import { reactive, ref } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import VueTurnstile from "vue-turnstile";
import { computed } from "vue";

// Props
const props = defineProps({
    contactInfo: {
        type: Object,
        required: true,
    },
    errors: {
        type: Object,
        default: () => ({}),
    },
});

const turnstile_site_key = import.meta.env.VITE_TURNSTILE_SITE_KEY;

// Form state
const form = useForm({
    token: "",
    name: "",
    phone: "",
    email: "",
    subject: "",
    timeline: "",
    budget: "",
    message: "",
    preferred_contact: "email",
});

const processing = ref(false);

// Form submission
const submitForm = () => {
    processing.value = true;

    form.post(route("contact.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
        onFinish: () => {
            processing.value = false;
        },
    });
};

const currentTheme = computed(() => {
    const savedTheme = localStorage.getItem("darkMode");
    if (savedTheme && savedTheme == "true") {
        return "dark";
    }
    return "light";
});

// Scroll to form
const scrollToForm = () => {
    const formElement = document.querySelector("form");
    if (formElement) {
        formElement.scrollIntoView({ behavior: "smooth" });

        // Focus on first input
        const firstInput = formElement.querySelector("input, textarea, select");
        if (firstInput) {
            firstInput.focus();
        }
    }
};

// Note: Removed copyToClipboard and callPhone functions since we removed email and phone sections
</script>
