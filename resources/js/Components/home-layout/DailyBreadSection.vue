<template>
    <section
        class="bg-gray-100 py-16"
        data-aos="zoom-in-down"
        data-aos-duration="1200"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800 mb-16">
                    <span class="border-b-2 border-gray-500">{{
                        messages.verse_of_the_day
                    }}</span>
                </h2>
                <p
                    id="dailyVersesWrapper"
                    class="text-md font-bold text-gray-600 mt-4"
                >
                    <span v-if="dailyVerse.message">
                        {{ dailyVerse.message }} - {{ dailyVerse.reference }}
                    </span>
                    <span v-else>
                        {{ dailyVerse }}
                    </span>
                </p>
            </div>
        </div>
    </section>
</template>
<script setup>
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";
const { props } = usePage();
const messages = ref(props.messages);
const dailyVerse = props.dailyVerse;
// console.log(props.dailyVerse);
</script>
