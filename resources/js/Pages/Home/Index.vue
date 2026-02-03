<template>
    <AppLayout>
        <Hero />
        <Services :services="services" />
        <ServicesCTA />
        <Portfolio :portfolio="portfolio" />
        <Testimonials :testimonials="testimonials" />
        <CTA />
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Hero from "@/Components/Hero.vue";
import Services from "@/Components/Services.vue";
import Portfolio from "@/Components/Portfolio.vue";
import Testimonials from "@/Components/Testimonials.vue";
import CTA from "@/Components/CTA.vue";
import ServicesCTA from "@/Components/ServicesCTA.vue";

defineProps({
    services: Array,
    portfolio: Array,
    testimonials: Array,
});
</script>
