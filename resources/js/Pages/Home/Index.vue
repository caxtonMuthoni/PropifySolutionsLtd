<template>
    <SEOHeader
        title="Propify Solutions | Leading Software Development Company in Kenya"
        description="Top software development agency in Nairobi, Kenya specializing in custom web applications, SaaS platforms, mobile apps, and digital solutions for Kenyan and international businesses."
        keywords="software development kenya, web development nairobi, custom software kenya, saas development nairobi, mobile app development kenya, api integration kenya, tech solutions nairobi, digital agency kenya, IT company kenya, software developers nairobi, web design kenya, business automation nairobi, cloud services kenya, software maintenance nairobi, database solutions kenya, e-commerce development kenya, startup software kenya, enterprise solutions nairobi"
        :image="og_image"
        :url="route('home')"
    />

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
import SEOHeader from "@/Components/Seo/SEOHeader.vue";

defineProps({
    og_image: String,
    services: Array,
    portfolio: Array,
    testimonials: Array,
});
</script>
