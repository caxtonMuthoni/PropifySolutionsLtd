<template>
    <Head>
        <title>{{ title }}</title>
        <meta name="description" :content="description" />
        <meta name="keywords" :content="keywords" />
        <meta property="og:title" :content="title" />
        <meta property="og:description" :content="description" />
        <meta property="og:image" :content="image" />
        <meta property="og:url" :content="url" />
        <meta property="og:type" content="website" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" :content="title" />
        <meta name="twitter:description" :content="description" />
        <meta name="twitter:image" :content="image" />
        <link rel="canonical" :href="url" />
    </Head>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    title: {
        type: String,
        default:
            "Propify Solutions | Custom Software Development Agency in Kenya",
    },
    description: {
        type: String,
        default:
            "Transform your digital ideas into reality. Propify Solutions is a leading software development agency in Kenya specializing in custom web applications, SaaS platforms, and digital solutions.",
    },
    keywords: {
        type: String,
        default:
            "software development kenya, web development nairobi, custom software development, saas development, api integration, mobile app development, digital solutions, tech agency kenya, software company nairobi",
    },
    image: {
        type: String,
        default: "/images/og-image.jpg",
    },
    url: {
        type: String,
        default: "/",
    },
});
</script>
