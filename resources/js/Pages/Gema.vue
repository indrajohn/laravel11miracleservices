<template>
    <BreadCrumb />
    <GemaLayout />
</template>

<script setup>
import BreadCrumb from "@/Components/utils/BreadCrumb.vue";
import GemaLayout from "@/Components/gema-layout/GemaLayout.vue";
import { useHead } from "@unhead/vue";
import { usePage } from "@inertiajs/vue3";
const seo = {
    ...usePage().head,
    title: "Gema - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
