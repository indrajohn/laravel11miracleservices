<template>
    <BreadCrumb />
</template>

<script setup>
import BreadCrumb from "@/Components/utils/BreadCrumb.vue";
const seo = {
    ...usePage().head,
    title: "Gallery - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
