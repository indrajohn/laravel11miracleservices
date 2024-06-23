<template>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">
                        {{ messages.history }}
                    </span>
                </h2>
                <p
                    class="text-left mt-8 bg-white rounded p-16 shadow-lg"
                    data-aos="zoom-in-down"
                    data-aos-duration="1200"
                >
                    {{ messages.history_desc_1 }}
                    <br />
                    <br />
                    {{ messages.history_desc_2 }}
                    <br />
                    <br />
                    {{ messages.history_desc_3 }}
                    <br />
                    <br />
                    {{ messages.history_desc_4 }}
                    <br />
                    <br />
                    {{ messages.history_desc_5 }}
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
</script>
