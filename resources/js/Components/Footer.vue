<template>
    <footer class="dark:bg-dark dark:text-light bg-white text-slate-800 py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="md:col-span-2 flex flex-col gap-4">
                    <application-logo />
                    <p class="text-slate-700 dark:text-slate-400 max-w-md">
                        Building modern, scalable web applications that help
                        businesses grow and succeed in the digital world.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li v-for="item in quickLinks" :key="item.name">
                            <a
                                :href="route(item.route)"
                                class="text-slate-700 dark:text-slate-400 hover:text-primary-500 transition-colors duration-200"
                            >
                                {{ item.name }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Connect</h3>
                    <div class="flex space-x-4">
                        <a
                            v-for="social in socialLinks"
                            :key="social.name"
                            :href="social.url"
                            class="text-slate-700 dark:text-slate-400 hover:text-primary-500 transition-colors duration-200"
                            target="_blank"
                        >
                            <span class="sr-only">{{ social.name }}</span>
                            <component :is="social.icon" class="w-6 h-6" />
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="border-t border-slate-200 dark:border-slate-800 mt-8 pt-8 text-center text-slate-700 darK:text-slate-400"
            >
                <p>
                    &copy; {{ new Date().getFullYear() }} Propify Solutions. All
                    rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Facebook, Github, LinkedinIcon, X } from "lucide-vue-next";
import ApplicationLogo from "./ApplicationLogo.vue";

const quickLinks = [
    { name: "Home", route: "home" },
    { name: "Services", route: "services" },
    { name: "Portfolio", route: "portfolio" },
    { name: "About", route: "about" },
    { name: "Contact", route: "contact" },
];

const socialLinks = [
    { name: "LinkedIn", url: "#", icon: LinkedinIcon },
    { name: "GitHub", url: "#", icon: Github },
    { name: "Twitter", url: "#", icon: X },
    { name: "Facebook", url: "#", icon: Facebook },
];
</script>
