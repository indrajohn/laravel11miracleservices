<template>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">
                        {{ messages.vision_and_mission }}
                    </span>
                </h2>
                <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
                    <div v-for="(mission, index) in missionList" :key="index">
                        <CardComponents :data="mission" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import CardComponents from "../utils/CardComponents.vue";
import { ref, computed, shallowRef } from "vue";
const { props } = usePage();
const messages = computed(() => props.messages);
const missionList = ref([
    {
        imageComponent: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-16 w-16 text-amber-700 text-center mx-auto">
  <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
</svg>
`,
        title: messages.value.vision,
        desc: messages.value.gbi_vision_detail,
    },
    {
        imageComponent: `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-16 w-16 text-amber-700 text-center mx-auto">
  <path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 1 .75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054A8.25 8.25 0 0 0 18 4.524l3.11-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.77l-.108-.054a8.25 8.25 0 0 0-5.69-.625l-2.202.55V21a.75.75 0 0 1-1.5 0V3A.75.75 0 0 1 3 2.25Z" clip-rule="evenodd" />
</svg>`,
        title: messages.value.mission,
        desc: messages.value.gbi_mission_detail,
    },
]);
</script>
