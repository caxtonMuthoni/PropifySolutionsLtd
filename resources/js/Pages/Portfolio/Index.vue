<template>
    <SEOHeader
        title="Software Development Portfolio in Kenya | Propify Solutions Projects"
        description="View our portfolio of software development projects built for Kenyan businesses. Real estate platforms, AI solutions, SaaS applications, and automation systems developed in Nairobi, Kenya."
        keywords="kenya software projects, nairobi tech portfolio, web development projects kenya, mobile app portfolio kenya, saas applications kenya, real estate software kenya, business automation kenya, AI solutions nairobi, software case studies kenya, digital solutions portfolio kenya, kenyan tech projects, local software development, nairobi developers portfolio, kenyan startups projects, e-commerce platforms kenya"
        :image="og_image"
        :url="route('portfolio')"
    />
    <AppLayout>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 bg-light dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h1
                        class="text-5xl md:text-6xl font-bold text-dark dark:text-light mb-6"
                    >
                        Our Portfolio
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                        Discover how we've helped businesses transform their
                        digital presence with cutting-edge software solutions.
                        Each project represents our commitment to quality and
                        innovation.
                    </p>
                    <div class="hidden md:flex flex-wrap justify-center gap-4">
                        <button
                            @click="filterByCategory('all')"
                            :class="[
                                'px-6 py-2 rounded-full font-medium transition-all duration-200',
                                activeFilter === 'all'
                                    ? 'bg-primary-500 text-white'
                                    : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700',
                            ]"
                        >
                            All Projects
                        </button>
                        <button
                            v-for="category in uniqueCategories"
                            :key="category"
                            @click="filterByCategory(category)"
                            :class="[
                                'px-6 py-2 rounded-full font-medium transition-all duration-200',
                                activeFilter === category
                                    ? 'bg-primary-500 text-white'
                                    : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700',
                            ]"
                        >
                            {{ category }}
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid -->
        <section class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <!-- Stats -->
                <div class="max-w-7xl mx-auto mb-12">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div
                            class="text-center p-6 bg-light dark:bg-gray-800 rounded-2xl"
                        >
                            <div
                                class="text-3xl md:text-4xl font-bold text-primary-500 mb-2"
                            >
                                {{ portfolio.length }}
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">
                                Total Projects
                            </div>
                        </div>
                        <div
                            class="text-center p-6 bg-light dark:bg-gray-800 rounded-2xl"
                        >
                            <div
                                class="text-3xl md:text-4xl font-bold text-primary-500 mb-2"
                            >
                                {{ uniqueCategories.length }}
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">
                                Industries
                            </div>
                        </div>
                        <div
                            class="text-center p-6 bg-light dark:bg-gray-800 rounded-2xl"
                        >
                            <div
                                class="text-3xl md:text-4xl font-bold text-primary-500 mb-2"
                            >
                                100%
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">
                                Client Satisfaction
                            </div>
                        </div>
                        <div
                            class="text-center p-6 bg-light dark:bg-gray-800 rounded-2xl"
                        >
                            <div
                                class="text-3xl md:text-4xl font-bold text-primary-500 mb-2"
                            >
                                40+
                            </div>
                            <div class="text-gray-600 dark:text-gray-400">
                                Technologies Used
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Projects Grid -->
                <div class="max-w-7xl mx-auto">
                    <div
                        v-if="filteredPortfolio.length === 0"
                        class="text-center py-12"
                    >
                        <div class="text-gray-500 dark:text-gray-400 text-lg">
                            No projects found in this category.
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                    >
                        <div
                            v-for="project in filteredPortfolio"
                            :key="project.id"
                            class="group bg-light dark:bg-gray-800 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2"
                        >
                            <!-- Project Image -->
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    :src="project.image_url"
                                    :alt="project.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                >
                                    <div class="absolute bottom-4 left-4">
                                        <span
                                            class="inline-block px-3 py-1 bg-primary-500 text-white text-sm font-medium rounded-full"
                                        >
                                            {{ project.category }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Content -->
                            <div class="p-8">
                                <div
                                    class="flex items-center justify-between mb-4"
                                >
                                    <h3
                                        class="text-xl font-bold text-dark dark:text-light group-hover:text-primary-500 transition-colors duration-200"
                                    >
                                        {{ project.title }}
                                    </h3>
                                    <button
                                        @click="openModal(project)"
                                        class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-primary-500 hover:text-white transition-all duration-200"
                                        title="View Details"
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
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <p
                                    class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3"
                                >
                                    {{ project.description }}
                                </p>

                                <!-- Project Features -->
                                <div class="space-y-2 mb-6">
                                    <div
                                        v-for="(
                                            feature, index
                                        ) in getProjectFeatures(project.id)"
                                        :key="index"
                                        class="flex items-center"
                                    >
                                        <svg
                                            class="w-4 h-4 text-primary-500 mr-2 flex-shrink-0"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <span
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                            >{{ feature }}</span
                                        >
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div
                                    class="flex items-center justify-between pt-6 border-t border-gray-200 dark:border-gray-700"
                                >
                                    <a
                                        href="#"
                                        @click.prevent="openModal(project)"
                                        class="text-primary-500 hover:text-primary-600 font-medium flex items-center group"
                                    >
                                        View Case Study
                                        <svg
                                            class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                                            />
                                        </svg>
                                    </a>
                                    <div class="flex space-x-2">
                                        <button
                                            @click="openModal(project)"
                                            class="px-4 py-2 bg-primary-500 hover:bg-primary-600 text-white text-sm font-medium rounded-lg transition-all duration-200"
                                        >
                                            Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-20 bg-gradient-to-r from-primary-500 to-secondary-500"
        >
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Have a Project in Mind?
                </h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Let's discuss how we can bring your vision to life with our
                    proven expertise and innovative approach.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                        href="/contact"
                        class="bg-white text-primary-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg"
                    >
                        Start Your Project
                    </a>
                    <a
                        href="/about"
                        class="bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105"
                    >
                        Learn About Us
                    </a>
                </div>
            </div>
        </section>

        <!-- Project Modal -->
        <div v-if="selectedProject" class="fixed inset-0 z-50 overflow-y-auto">
            <div
                class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
            >
                <!-- Background overlay -->
                <div
                    class="fixed inset-0 transition-opacity"
                    aria-hidden="true"
                >
                    <div
                        class="absolute inset-0 bg-black/75"
                        @click="closeModal"
                    ></div>
                </div>

                <!-- Modal content -->
                <div
                    class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full"
                >
                    <!-- Modal header -->
                    <div
                        class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="inline-block px-3 py-1 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 text-sm font-medium rounded-full mb-2"
                                >
                                    {{ selectedProject.category }}
                                </span>
                                <h3
                                    class="text-2xl font-bold text-dark dark:text-light"
                                >
                                    {{ selectedProject.title }}
                                </h3>
                            </div>
                            <button
                                @click="closeModal"
                                class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors duration-200"
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
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Modal body -->
                    <div class="px-6 py-6">
                        <div class="mb-8">
                            <img
                                :src="selectedProject.image_url"
                                :alt="selectedProject.title"
                                class="w-full h-64 md:h-80 object-cover rounded-xl mb-6"
                            />
                            <p class="text-lg text-gray-600 dark:text-gray-300">
                                {{ selectedProject.description }}
                            </p>
                        </div>

                        <!-- Project Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Key Features -->
                            <div>
                                <h4
                                    class="text-xl font-bold text-dark dark:text-light mb-4"
                                >
                                    Key Features
                                </h4>
                                <ul class="space-y-3">
                                    <li
                                        v-for="(
                                            feature, index
                                        ) in getProjectFeatures(
                                            selectedProject.id,
                                        )"
                                        :key="index"
                                        class="flex items-start"
                                    >
                                        <svg
                                            class="w-5 h-5 text-primary-500 mr-3 mt-0.5 flex-shrink-0"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <span
                                            class="text-gray-600 dark:text-gray-300"
                                            >{{ feature }}</span
                                        >
                                    </li>
                                </ul>
                            </div>

                            <!-- Technologies -->
                            <div>
                                <h4
                                    class="text-xl font-bold text-dark dark:text-light mb-4"
                                >
                                    Technologies Used
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        v-for="(
                                            tech, index
                                        ) in getProjectTechnologies(
                                            selectedProject.id,
                                        )"
                                        :key="index"
                                        class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm"
                                    >
                                        {{ tech }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div
                        class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800"
                    >
                        <div class="flex justify-end space-x-4">
                            <button
                                @click="closeModal"
                                class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                            >
                                Close
                            </button>
                            <a
                                href="/contact"
                                class="px-6 py-2 bg-primary-500 hover:bg-primary-600 text-white rounded-lg transition-colors duration-200"
                            >
                                Start Similar Project
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import SEOHeader from "@/Components/Seo/SEOHeader.vue";

const props = defineProps({
    og_image: String,
    portfolio: {
        type: Array,
        required: true,
        default: () => [],
    },
});

const activeFilter = ref("all");
const selectedProject = ref(null);

// Get unique categories from portfolio
const uniqueCategories = computed(() => {
    const categories = props.portfolio.map((project) => project.category);
    return [...new Set(categories)];
});

// Filter portfolio based on active category
const filteredPortfolio = computed(() => {
    if (activeFilter.value === "all") {
        return props.portfolio;
    }
    return props.portfolio.filter(
        (project) => project.category === activeFilter.value,
    );
});

// Filter by category
const filterByCategory = (category) => {
    activeFilter.value = category;
    window.scrollTo({ top: 280, behavior: "smooth" });
};

// Open modal with project details
const openModal = (project) => {
    selectedProject.value = project;
    document.body.style.overflow = "hidden";
};

// Close modal
const closeModal = () => {
    selectedProject.value = null;
    document.body.style.overflow = "auto";
};

// Close modal on Escape key
onMounted(() => {
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && selectedProject.value) {
            closeModal();
        }
    });
});

// Helper function to get project features (you can extend this with actual data)
const getProjectFeatures = (projectId) => {
    const features = {
        1: [
            "Property Listings Management",
            "Lead Generation System",
            "Secure User Authentication",
            "Real-time Notifications",
            "Advanced Search Filters",
        ],
        2: [
            "Multi-platform Scheduling",
            "AI Content Suggestions",
            "Team Collaboration Tools",
            "Analytics Dashboard",
            "Automated Publishing",
        ],
        3: [
            "AI-Powered Resume Generation",
            "ATS Optimization",
            "Custom Templates",
            "Export Options (PDF, Word)",
            "Career Guidance",
        ],
        4: [
            "Farm Activity Tracking",
            "Inventory Management",
            "Weather Integration",
            "Reporting Dashboard",
            "Mobile Accessibility",
        ],
        5: [
            "Online Ordering System",
            "Menu Management",
            "Payment Integration",
            "Order Tracking",
            "Customer Reviews",
        ],
        6: [
            "Reservation Management",
            "Room Availability Calendar",
            "Guest Records",
            "Billing System",
            "Housekeeping Management",
        ],
    };
    return (
        features[projectId] || [
            "Custom Features",
            "User-friendly Interface",
            "Scalable Architecture",
            "Secure Implementation",
        ]
    );
};

// Helper function to get project technologies
const getProjectTechnologies = (projectId) => {
    const technologies = {
        1: ["Vue.js", "Laravel", "MySQL", "Redis", "AWS"],
        2: ["React", "Node.js", "MongoDB", "Python", "Firebase"],
        3: ["Vue.js", "Laravel", "OpenAI API", "PostgreSQL", "Docker"],
        4: ["React Native", "Django", "PostgreSQL", "Chart.js", "AWS"],
        5: ["Vue.js", "Laravel", "MySQL", "Stripe", "Redis"],
        6: ["React", "Node.js", "MongoDB", "Express", "JWT"],
    };
    return (
        technologies[projectId] || [
            "Modern Framework",
            "Relational Database",
            "Cloud Services",
            "REST API",
        ]
    );
};
</script>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
