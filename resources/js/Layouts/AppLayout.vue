<template>
    <div
        class="min-h-screen bg-light dark:bg-dark transition-colors duration-300"
    >
        <Navbar />
        <main>
            <slot />
        </main>
        <Footer />
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue";
import Footer from "@/Components/Footer.vue";
</script>
