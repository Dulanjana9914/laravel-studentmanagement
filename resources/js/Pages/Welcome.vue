<template>
    <Head title="Welcome" />

    <div
        class="relative min-h-screen sm:flex sm:justify-center sm:items-center bg-gradient-to-b from-purple-500 via-pink-500 to-red-500 dark:bg-gradient-to-b dark:from-gray-900 dark:via-gray-900 dark:to-black selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Register</Link>
            </template>
        </div>
        <div class="flex flex-col justify-start">
            <img src="https://gdm-catalog-fmapi-prod.imgix.net/ProductLogo/6565bd61-0fe6-459e-9ae4-69ead84c1fc4.png"
                alt="logo">
        </div>
        <div class="flex flex-col">
            <h1 class="mt-10 text-6xl text-white">Hi There!</h1>
            <h1 class="mt-10 text-4xl text-white">Welcome to the Student Management System</h1>

            <div class="mt-8">
                <p class="text-lg text-gray-300">This system provides you with the following features:</p>
                <ul class="mt-4 list-disc list-inside">
                    <li class="text-gray-400">Add Student Records</li>
                    <li class="text-gray-400">View Student Data</li>
                    <li class="text-gray-400">Edit Student Details</li>
                    <li class="text-gray-400">Delete Student Records</li>
                </ul>
            </div>

            <div class="mt-8 ">
                <p class="text-gray-300 ">Start by logging in or registering if you haven't already.</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<style>
.bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(103, 58, 183, 1), rgba(233, 30, 99, 1), rgba(255, 0, 0, 1));
}

.dark\:bg-gradient-to-b {
    background-image: linear-gradient(to bottom, rgba(39, 39, 39, 1), rgba(17, 17, 17, 1), rgba(0, 0, 0, 1));
}
</style>
