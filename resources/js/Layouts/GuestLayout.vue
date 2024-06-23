<!-- resources/js/Components/GuestLayout.vue -->
<template>
    <main>
        <header>
            <Navbar />
        </header>
        <slot></slot>
        <Footer />
    </main>
</template>

<script setup>
import { useHead } from "@unhead/vue";
import Navbar from "@/Components/Navbar.vue";
import Footer from "@/Components/Footer.vue";
import { register } from "swiper/element/bundle";
import { usePage } from "@inertiajs/vue3";
register();
const { head } = usePage().props;

useHead(head);
</script>
