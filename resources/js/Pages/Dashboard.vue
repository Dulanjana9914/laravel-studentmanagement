<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
            <div
                class="relative min-h-screen sm:flex sm:justify-center sm:items-center bg-gradient-to-b from-purple-500 via-pink-500 to-red-500 dark:bg-gradient-to-b dark:from-gray-900 dark:via-gray-900 dark:to-black selection:bg-red-500 selection:text-white">
                <div class="flex flex-col">
                    <div class="mt-8">
                        <div class="flex flex-col justify-center max-h-80">
                            <img class="flex h-12 w-14"
                                src="https://gdm-catalog-fmapi-prod.imgix.net/ProductLogo/6565bd61-0fe6-459e-9ae4-69ead84c1fc4.png"
                                alt="logo" style="width: 350px; height: 300px;">
                        </div>
                        <div class="flex justify-center mt-10">
                            <Link :href="route('students')"
                                class="px-4 py-2 font-semibold text-blue-500 border border-blue-500 rounded-lg hover:text-blue-600 hover:border-blue-600"
                                style="font-size: 1.2em;">
                            Get Started
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </template>


    </AuthenticatedLayout>
</template>
<style>
.bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(103, 58, 183, 1), rgba(233, 30, 99, 1), rgba(255, 0, 0, 1));
}

.dark\:bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(39, 39, 39, 1), rgba(17, 17, 17, 1), rgba(0, 0, 0, 1));
}
</style>
