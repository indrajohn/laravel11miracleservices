<template>
    <BreadCrumb />
    <VisionAndMission />
    <History />
    <SeniorPastor />
    <StructuralOrganization />
</template>

<script setup>
import BreadCrumb from "@/Components/utils/BreadCrumb.vue";
import History from "@/Components/about-us-layout/History.vue";
import SeniorPastor from "@/Components/about-us-layout/SeniorPastor.vue";
import StructuralOrganization from "@/Components/about-us-layout/StructuralOrganization.vue";
import VisionAndMission from "@/Components/about-us-layout/VisionAndMission.vue";
import { useHead } from "@unhead/vue";
import { usePage } from "@inertiajs/vue3";

const seo = {
    ...usePage().head,
    title: "About Us - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
