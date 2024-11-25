<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import HeaderContent from '@/ComponentsFrontEnd/HeaderContent.vue';
import FooterContent from '@/ComponentsFrontEnd/FooterContent.vue';
</script>

<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0"
    >
        <!-- Header Section -->
        <header class="w-full bg-blue-600 text-white">
            <HeaderContent />
        </header>

        <!-- Main Content -->
        <div class="mx-auto flex-grow">
            <slot />
        </div>

        <!-- Footer Section -->
        <footer class="w-full bg-gray-8 text-white">
            <FooterContent />
        </footer>
    </div>
</template>
