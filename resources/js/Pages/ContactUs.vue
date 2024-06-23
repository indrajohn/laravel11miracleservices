<template>
    <BreadCrumb />
    <ContactUs />
</template>

<script setup>
import BreadCrumb from "@/Components/utils/BreadCrumb.vue";
import ContactUs from "@/Components/contact-us/ContactUs.vue";
import { useHead } from "@unhead/vue";
import { usePage } from "@inertiajs/vue3";
const seo = {
    ...usePage().head,
    title: "Contact Us - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
