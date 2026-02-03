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

server { server_name solutions.propify.co.ke; root
/var/www/agency/PropifySolutionsLtd/public; add_header X-Frame-Options
"SAMEORIGIN"; add_header X-Content-Type-Options "nosniff"; index index.php;
charset utf-8; location / { try_files $uri $uri/ /index.php?$query_string; }
location = /favicon.ico { access_log off; log_not_found off; } location =
/robots.txt { access_log off; log_not_found off; } error_page 404 /index.php;
location ~ ^/index\.php(/|$) { fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name; include
fastcgi_params; fastcgi_hide_header X-Powered-By; } location ~
/\.(?!well-known).* { deny all; } }
