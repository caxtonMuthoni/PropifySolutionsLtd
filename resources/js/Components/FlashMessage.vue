<template>
    <transition name="fade" appear>
        <div
            v-if="message"
            class="flex items-center gap-4"
            :class="[
                'fixed top-5 right-5 z-50 px-6 py-4 rounded-lg shadow-md text-white font-medium',
                typeClasses[type] || typeClasses.success,
            ]"
        >
            <component :is="icons[type]" />

            {{ message }}

            <button @click="message = null">
                <x />
            </button>
        </div>
    </transition>
</template>

<script setup>
import { ref, watch } from "vue";
import { usePage } from "@inertiajs/vue3";
import { AlertTriangle, CheckCircle, X, XCircle } from "lucide-vue-next";

const page = usePage();

const message = ref(null);
const type = ref("success");

// Map flash types to colors (Tailwind)
const typeClasses = {
    success: "bg-green-500 dark:bg-green-600",
    error: "bg-red-500 dark:bg-red-600",
    warning: "bg-yellow-500 dark:bg-yellow-600",
};

const icons = {
    success: CheckCircle,
    error: XCircle,
    warning: AlertTriangle,
};

// Watch Laravel flash props
watch(
    () => page.props.flash,
    (flash) => {
        if (flash.success) {
            message.value = flash.success;
            type.value = "success";
            autoHide();
        } else if (flash.error) {
            message.value = flash.error;
            type.value = "error";
            autoHide();
        }
    },
    { immediate: true },
);

// Auto hide after 4 seconds
function autoHide() {
    setTimeout(() => {
        message.value = null;
    }, 4000);
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
