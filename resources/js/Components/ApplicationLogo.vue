<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <Link :href="route('home')" class="flex items-center space-x-3">
        <div class="relative group">
            <!-- Background glow on hover -->
            <div
                class="absolute -inset-1 bg-gradient-to-r from-primary-500 to-secondary-500 rounded-xl blur opacity-0 group-hover:opacity-20 transition-opacity duration-500"
            ></div>
            <!-- Main logo -->
            <div
                class="relative w-12 h-12 bg-gradient-to-br from-primary-600 to-secondary-500 rounded-xl flex items-center justify-center shadow-lg transform group-hover:rotate-3 transition-transform duration-300"
            >
                <span class="text-white font-bold text-xl">P</span>
            </div>
            <!-- Corner accent -->
            <div
                class="absolute -bottom-1 -right-1 w-3 h-3 bg-gradient-to-br from-secondary-400 to-primary-300 rounded-full border-2 border-white dark:border-slate-800"
            ></div>
        </div>
        <div>
            <span class="text-2xl font-bold text-slate-900 dark:text-white">
                Propify<span class="text-primary-500 dark:text-primary-400"
                    >.</span
                >
            </span>
            <span
                class="text-sm font-medium text-slate-600 dark:text-slate-400 block -mt-1"
                >Solutions Ltd</span
            >
        </div>
    </Link>
</template>
