<template>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">
                        {{ messages.statement_of_faith }}
                    </span>
                </h2>
                <div
                    class="text-left mt-8 bg-white rounded p-16 shadow-lg"
                    data-aos="zoom-in-up"
                    data-aos-duration="1200"
                >
                    {{ messages.state_of_faith_title }}
                    <ul class="list-disc leading-8">
                        <li>{{ messages.state_of_faith_desc1 }}</li>
                        <li>{{ messages.state_of_faith_desc2 }}</li>
                        <li>{{ messages.state_of_faith_desc3 }}</li>
                        <li>{{ messages.state_of_faith_desc4 }}</li>
                        <li>{{ messages.state_of_faith_desc5 }}</li>
                        <li>{{ messages.state_of_faith_desc6 }}</li>
                        <li>{{ messages.state_of_faith_desc7 }}</li>
                        <li>{{ messages.state_of_faith_desc8 }}</li>
                        <li>{{ messages.state_of_faith_desc9 }}</li>
                        <li>{{ messages.state_of_faith_desc10 }}</li>
                        <li>{{ messages.state_of_faith_desc11 }}</li>
                        <li>{{ messages.state_of_faith_desc12 }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";
const { props } = usePage();
const messages = ref(props.messages);
</script>
