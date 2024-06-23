<template>
    <BreadCrumb />
    <StatementOfFaith />
</template>

<script setup>
import BreadCrumb from "@/Components/utils/BreadCrumb.vue";
import StatementOfFaith from "@/Components/statement-of-faith/StatementOfFaith.vue";

import { useHead } from "@unhead/vue";
import { usePage } from "@inertiajs/vue3";
const seo = {
    ...usePage().head,
    title: "Statement Of Faith - Gereja Bethel Indonesia - Miracle Services Sydney Australia",
};
useHead(seo);
</script>
