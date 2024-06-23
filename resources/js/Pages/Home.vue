<!-- resources/js/Pages/Home.vue -->
<template>
    <HeroSection />
    <ServiceTimeSection />
    <PreachSection />
    <DailyBreadSection />
</template>

<script setup>
import HeroSection from "@/Components/home-layout/HeroSection.vue";
import DailyBreadSection from "@/Components/home-layout/DailyBreadSection.vue";
import PreachSection from "@/Components/home-layout/PreachSection.vue";
import ServiceTimeSection from "@/Components/home-layout/ServiceTimeSection.vue";
import { useHead } from "@unhead/vue";
import { usePage } from "@inertiajs/vue3";

const seo = {
    ...usePage().head,
    title: "Home - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
