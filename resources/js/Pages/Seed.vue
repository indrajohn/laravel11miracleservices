<template>
    <BreadCrumb />
    <Seed />
</template>

<script setup>
import BreadCrumb from "@/Components/utils/BreadCrumb.vue";
import Seed from "@/Components/seed-layout/Seed.vue";
import { useHead } from "@unhead/vue";
import { usePage } from "@inertiajs/vue3";
const seo = {
    ...usePage().head,
    title: "Seed - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
