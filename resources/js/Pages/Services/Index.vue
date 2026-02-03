<template>
    <SEOHeader
        title="Custom Software Development Services in Kenya | Propify Solutions"
        description="Professional software development services in Nairobi, Kenya. We build custom web applications, SaaS platforms, API integration, and business automation solutions for Kenyan businesses and startups."
        keywords="software development kenya, custom software nairobi, web development company kenya, saas development kenya, api integration services nairobi, tech solutions kenya, software agency nairobi, digital transformation kenya, business automation kenya, mobile app development kenya, e-commerce solutions kenya, cloud services nairobi, IT solutions kenya, software maintenance kenya, database design kenya, backend development nairobi"
        pageType="services"
        :image="og_image"
        :url="route('services')"
    />

    <AppLayout>
        <!-- Hero Section -->
        <section class="pt-32 md:pb-20 pb-8 bg-light dark:bg-dark">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h1
                        class="text-5xl md:text-6xl font-bold text-dark dark:text-light mb-6"
                    >
                        Our Services
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                        Comprehensive software development solutions tailored to
                        your business needs. We transform ideas into reliable,
                        scalable, and high-performing digital products.
                    </p>
                    <div
                        class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 rounded-full font-medium"
                    >
                        <svg
                            class="w-5 h-5 mr-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"
                            />
                        </svg>
                        Trusted by 40+ businesses
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Overview -->
        <section class="py-10 md:py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="max-w-7xl mx-auto">
                    <!-- Stats Banner -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                        <div
                            class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl p-8 text-center text-white shadow-lg"
                        >
                            <div class="text-3xl md:text-4xl font-bold mb-2">
                                8+
                            </div>
                            <div class="text-white/90">
                                Specialized Services
                            </div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-2xl p-8 text-center text-white shadow-lg"
                        >
                            <div class="text-3xl md:text-4xl font-bold mb-2">
                                150+
                            </div>
                            <div class="text-white/90">Projects Delivered</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary-500 to-secondary-500 rounded-2xl p-8 text-center text-white shadow-lg"
                        >
                            <div class="text-3xl md:text-4xl font-bold mb-2">
                                98%
                            </div>
                            <div class="text-white/90">Client Satisfaction</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-gray-800 to-gray-900 dark:from-gray-700 dark:to-gray-800 rounded-2xl p-8 text-center text-white shadow-lg"
                        >
                            <div class="text-3xl md:text-4xl font-bold mb-2">
                                24/7
                            </div>
                            <div class="text-white/90">Support Available</div>
                        </div>
                    </div>

                    <!-- Services Grid -->
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
                    >
                        <div
                            v-for="service in services"
                            :key="service.id"
                            class="group bg-light dark:bg-gray-800 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-transparent hover:border-primary-500/20"
                        >
                            <!-- Service Icon -->
                            <div
                                class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        v-if="service.icon === 'code-bracket'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"
                                    />
                                    <path
                                        v-if="service.icon === 'server-stack'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"
                                    />
                                    <path
                                        v-if="service.icon === 'cloud'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4 4 0 003 15z"
                                    />
                                    <path
                                        v-if="
                                            service.icon === 'arrows-right-left'
                                        "
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"
                                    />
                                    <path
                                        v-if="service.icon === 'circle-stack'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                    />
                                    <path
                                        v-if="service.icon === 'lock-closed'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                    />
                                    <path
                                        v-if="service.icon === 'rocket-launch'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"
                                    />
                                    <path
                                        v-if="service.icon === 'chart-bar'"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                                    />
                                </svg>
                            </div>

                            <!-- Service Title -->
                            <h3
                                class="text-xl font-bold text-dark dark:text-light mb-4 group-hover:text-primary-500 transition-colors duration-200"
                            >
                                {{ service.title }}
                            </h3>

                            <!-- Service Description -->
                            <p class="text-gray-600 dark:text-gray-300 mb-6">
                                {{ service.description }}
                            </p>

                            <!-- Service Features -->
                            <ul class="space-y-3 mb-6">
                                <li
                                    v-for="(
                                        feature, index
                                    ) in getServiceFeatures(service.id)"
                                    :key="index"
                                    class="flex items-center text-sm"
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
                                        class="text-gray-600 dark:text-gray-400"
                                        >{{ feature }}</span
                                    >
                                </li>
                            </ul>

                            <!-- CTA -->
                            <a
                                href="#"
                                @click.prevent="openServiceModal(service)"
                                class="inline-flex items-center text-primary-500 hover:text-primary-600 font-medium group/cta"
                            >
                                <span>Learn More</span>
                                <svg
                                    class="w-4 h-4 ml-1 group-hover/cta:translate-x-1 transition-transform duration-200"
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Development Process -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="container mx-auto px-6">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16">
                        <h2
                            class="text-3xl font-bold text-dark dark:text-light mb-4"
                        >
                            Our Development Process
                        </h2>
                        <p
                            class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto"
                        >
                            We follow a structured, transparent process to
                            ensure your project's success from concept to
                            deployment and beyond.
                        </p>
                    </div>

                    <div class="relative">
                        <!-- Process Timeline -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                            <div
                                v-for="(step, index) in processSteps"
                                :key="index"
                                class="relative group"
                            >
                                <div
                                    class="flex flex-col items-center text-center"
                                >
                                    <!-- Step Number -->
                                    <div
                                        class="w-16 h-16 flex items-center justify-center rounded-full bg-white dark:bg-gray-900 border-4 border-primary-500 text-primary-500 text-xl font-bold mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg"
                                    >
                                        {{ index + 1 }}
                                    </div>

                                    <!-- Step Content -->
                                    <div
                                        class="bg-white dark:bg-gray-900 rounded-2xl p-6 shadow-lg"
                                    >
                                        <h3
                                            class="text-lg font-bold text-dark dark:text-light mb-3"
                                        >
                                            {{ step.title }}
                                        </h3>
                                        <p
                                            class="text-gray-600 dark:text-gray-300 text-sm"
                                        >
                                            {{ step.description }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Connector Line -->
                                <div
                                    v-if="index < 3"
                                    class="hidden md:block absolute top-8 left-3/4 w-full h-0.5 bg-gradient-to-r from-primary-500 to-transparent"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Stack -->
        <section class="py-20 bg-white dark:bg-gray-900">
            <div class="container mx-auto px-6">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16">
                        <h2
                            class="text-3xl font-bold text-dark dark:text-light mb-4"
                        >
                            Technology Stack
                        </h2>
                        <p
                            class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto"
                        >
                            We leverage modern technologies and frameworks to
                            build robust, scalable, and future-proof
                            applications.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                        <div
                            v-for="(stack, index) in technologyStack"
                            :key="index"
                            class="text-center"
                        >
                            <div
                                class="w-20 h-20 mx-auto mb-6 flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-2xl group hover:shadow-xl transition-all duration-300"
                            >
                                <div class="text-2xl">
                                    {{ stack.icon }}
                                </div>
                            </div>
                            <h3
                                class="font-bold text-dark dark:text-light mb-2"
                            >
                                {{ stack.name }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ stack.technologies.join(", ") }}
                            </p>
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
                    Ready to Start Your Project?
                </h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Let's discuss how we can help you achieve your business
                    goals with our comprehensive software development services.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a
                        href="/contact"
                        class="bg-white text-primary-600 hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg"
                    >
                        Get Free Consultation
                    </a>
                    <a
                        href="/portfolio"
                        class="bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105"
                    >
                        View Our Work
                    </a>
                </div>
            </div>
        </section>

        <!-- Service Modal -->
        <div v-if="selectedService" class="fixed inset-0 z-50 overflow-y-auto">
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
                        @click="closeServiceModal"
                    ></div>
                </div>

                <!-- Modal content -->
                <div
                    class="inline-block align-bottom bg-white dark:bg-gray-900 rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                >
                    <!-- Modal header -->
                    <div
                        class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"
                    >
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-lg flex items-center justify-center mr-4"
                                >
                                    <svg
                                        class="w-6 h-6 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            :d="
                                                getServiceIconPath(
                                                    selectedService.icon,
                                                )
                                            "
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                        />
                                    </svg>
                                </div>
                                <h3
                                    class="text-2xl font-bold text-dark dark:text-light"
                                >
                                    {{ selectedService.title }}
                                </h3>
                            </div>
                            <button
                                @click="closeServiceModal"
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
                        <p
                            class="text-lg text-gray-600 dark:text-gray-300 mb-8"
                        >
                            {{ selectedService.description }}
                        </p>

                        <!-- Detailed Features -->
                        <div>
                            <h4
                                class="text-xl font-bold text-dark dark:text-light mb-4"
                            >
                                What's Included
                            </h4>
                            <ul class="space-y-4">
                                <li
                                    v-for="(
                                        feature, index
                                    ) in getServiceDetails(selectedService.id)"
                                    :key="index"
                                    class="flex"
                                >
                                    <svg
                                        class="w-5 h-5 text-primary-500 mr-3 mt-0.5 flex-shrink-0"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    <div>
                                        <p
                                            class="text-gray-600 dark:text-gray-300"
                                        >
                                            {{ feature }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Typical Deliverables -->
                        <div class="mt-8">
                            <h4
                                class="text-xl font-bold text-dark dark:text-light mb-4"
                            >
                                Typical Deliverables
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    v-for="(
                                        deliverable, index
                                    ) in getServiceDeliverables(
                                        selectedService.id,
                                    )"
                                    :key="index"
                                    class="px-3 py-1 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full text-sm"
                                >
                                    {{ deliverable }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div
                        class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800"
                    >
                        <div class="flex justify-end space-x-4">
                            <button
                                @click="closeServiceModal"
                                class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200"
                            >
                                Close
                            </button>
                            <a
                                href="/contact"
                                class="px-6 py-2 bg-primary-500 hover:bg-primary-600 text-white rounded-lg transition-colors duration-200"
                            >
                                Get This Service
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import SEOHeader from "@/Components/Seo/SEOHeader.vue";

const props = defineProps({
    og_image: String,
    services: {
        type: Array,
        required: true,
        default: () => [],
    },
});

const selectedService = ref(null);

// Development process steps
const processSteps = [
    {
        title: "Discovery & Planning",
        description:
            "Requirements gathering, project scoping, and technical planning",
    },
    {
        title: "Design & Prototyping",
        description:
            "UI/UX design, architecture planning, and prototype development",
    },
    {
        title: "Development & Testing",
        description:
            "Agile development, code reviews, and rigorous quality assurance",
    },
    {
        title: "Deployment & Support",
        description:
            "Production deployment, monitoring, and ongoing maintenance",
    },
];

// Technology stack
const technologyStack = [
    {
        name: "Frontend",
        icon: "🖥️",
        technologies: ["Vue.js", "React", "TypeScript", "Tailwind CSS"],
    },
    {
        name: "Backend",
        icon: "⚙️",
        technologies: ["Laravel", "Node.js", "Python", "Java"],
    },
    {
        name: "Databases",
        icon: "🗄️",
        technologies: ["MySQL", "PostgreSQL", "MongoDB", "Redis"],
    },
    {
        name: "Cloud & DevOps",
        icon: "☁️",
        technologies: ["AWS", "Docker", "Kubernetes", "CI/CD"],
    },
];

// Helper function to get service features
const getServiceFeatures = (serviceId) => {
    const features = {
        1: [
            "Custom UI/UX Design",
            "Responsive Development",
            "Performance Optimization",
            "Cross-browser Compatibility",
        ],
        2: [
            "Scalable Architecture",
            "API Documentation",
            "Security Implementation",
            "Performance Monitoring",
        ],
        3: [
            "Multi-tenant Architecture",
            "Subscription Management",
            "Role-based Access",
            "Analytics Dashboard",
        ],
        4: [
            "API Integration",
            "Webhook Implementation",
            "Data Synchronization",
            "Error Handling",
        ],
        5: [
            "Database Design",
            "Query Optimization",
            "Data Migration",
            "Backup Solutions",
        ],
        6: [
            "OAuth Integration",
            "JWT Authentication",
            "Role Management",
            "Security Audits",
        ],
        7: [
            "CI/CD Pipeline",
            "Cloud Deployment",
            "Infrastructure as Code",
            "Monitoring Setup",
        ],
        8: [
            "Bug Fixing",
            "Performance Tuning",
            "Security Updates",
            "Regular Backups",
        ],
    };
    return (
        features[serviceId] || [
            "Professional Implementation",
            "Quality Assurance",
            "Timely Delivery",
            "Ongoing Support",
        ]
    );
};

// Helper function to get detailed service information
const getServiceDetails = (serviceId) => {
    const details = {
        1: [
            "Custom design based on your brand and user requirements",
            "Responsive development for all devices and screen sizes",
            "Performance optimization for fast loading and smooth interaction",
            "Cross-browser compatibility testing",
            "SEO-friendly code structure",
            "Accessibility compliance (WCAG standards)",
        ],
        2: [
            "Scalable server architecture using microservices or monolith as needed",
            "Comprehensive API documentation with Swagger/OpenAPI",
            "Implement security best practices including data encryption",
            "Real-time performance monitoring and logging",
            "Database optimization and caching strategies",
            "Automated testing and quality assurance",
        ],
        3: [
            "Multi-tenant architecture with data isolation",
            "Subscription billing and payment gateway integration",
            "Comprehensive user role and permission management",
            "Real-time analytics and reporting dashboard",
            "Automated email notifications and alerts",
            "Scalable infrastructure for growing user base",
        ],
        4: [
            "Secure integration with third-party APIs and services",
            "Webhook implementation for real-time data updates",
            "Data synchronization and conflict resolution",
            "Comprehensive error handling and logging",
            "Rate limiting and API quota management",
            "Authentication and authorization for external services",
        ],
        5: [
            "Database schema design and normalization",
            "Query optimization for improved performance",
            "Data migration planning and execution",
            "Automated backup and disaster recovery solutions",
            "Database security and access control",
            "Performance monitoring and tuning",
        ],
        6: [
            "OAuth 2.0 and social authentication integration",
            "JWT-based secure token management",
            "Role-based access control (RBAC) implementation",
            "Two-factor authentication (2FA) support",
            "Session management and security",
            "Regular security audits and vulnerability assessments",
        ],
        7: [
            "Continuous Integration and Deployment (CI/CD) pipeline setup",
            "Cloud infrastructure provisioning and management",
            "Infrastructure as Code using Terraform or CloudFormation",
            "Application monitoring and alerting systems",
            "Load balancing and auto-scaling configuration",
            "Containerization with Docker and orchestration",
        ],
        8: [
            "Regular bug fixes and security patches",
            "Performance monitoring and optimization",
            "Database maintenance and optimization",
            "Security updates and compliance maintenance",
            "Regular backups and disaster recovery testing",
            "Technical support and troubleshooting",
        ],
    };
    return (
        details[serviceId] || [
            "Professional implementation by experienced developers",
            "Rigorous quality assurance and testing",
            "Timely delivery within agreed schedule",
            "Comprehensive documentation",
            "Ongoing support and maintenance",
            "Regular progress updates and communication",
        ]
    );
};

// Helper function to get service deliverables
const getServiceDeliverables = (serviceId) => {
    const deliverables = {
        1: [
            "Responsive Web Application",
            "Source Code",
            "Documentation",
            "Deployment",
            "Testing Reports",
        ],
        2: [
            "Backend System",
            "API Documentation",
            "Database Schema",
            "Security Report",
            "Performance Metrics",
        ],
        3: [
            "SaaS Platform",
            "Admin Dashboard",
            "User Management",
            "Billing System",
            "Analytics",
        ],
        4: [
            "Integrated System",
            "API Documentation",
            "Webhook Setup",
            "Testing Suite",
            "Error Handling Guide",
        ],
        5: [
            "Database Design",
            "Optimized Queries",
            "Migration Scripts",
            "Backup Strategy",
            "Performance Report",
        ],
        6: [
            "Auth System",
            "Access Control",
            "Security Audit",
            "Implementation Guide",
            "Testing Suite",
        ],
        7: [
            "CI/CD Pipeline",
            "Cloud Setup",
            "Monitoring Tools",
            "Deployment Scripts",
            "Infrastructure Docs",
        ],
        8: [
            "Maintenance Plan",
            "Monitoring Dashboard",
            "Security Updates",
            "Performance Reports",
            "Support Portal",
        ],
    };
    return (
        deliverables[serviceId] || [
            "Complete Solution",
            "Documentation",
            "Testing",
            "Deployment",
            "Support",
        ]
    );
};

// Get SVG path for service icon
const getServiceIconPath = (iconName) => {
    const paths = {
        "code-bracket": "M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4",
        "server-stack":
            "M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01",
        cloud: "M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4 4 0 003 15z",
        "arrows-right-left": "M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4",
        "circle-stack":
            "M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4",
        "lock-closed":
            "M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z",
        "rocket-launch": "M13 10V3L4 14h7v7l9-11h-7z",
        "chart-bar":
            "M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z",
    };
    return paths[iconName] || "M13 10V3L4 14h7v7l9-11h-7z";
};

// Open service modal
const openServiceModal = (service) => {
    selectedService.value = service;
    document.body.style.overflow = "hidden";
};

// Close service modal
const closeServiceModal = () => {
    selectedService.value = null;
    document.body.style.overflow = "auto";
};
</script>

<style scoped>
/* Custom styles for the process timeline connector */
.hidden.md\:block {
    display: none;
}

@media (min-width: 768px) {
    .hidden.md\:block {
        display: block;
    }
}

/* Smooth transitions for modal */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
