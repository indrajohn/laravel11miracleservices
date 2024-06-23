<template>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">{{
                        messages.seed
                    }}</span>
                </h2>
                <p class="text-center mt-8">
                    {{ messages.seed_quotes }}
                </p>
                <div
                    class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3"
                >
                    <div class="my-8 p-4">
                        <div
                            class="bg-white rounded-lg shadow-md flex flex-col justify-center h-[250px]"
                            data-aos="flip-left"
                            data-aos-duration="1200"
                        >
                            <div class="p-4">
                                <h3 class="text-xl font-bold mb-2 text-center">
                                    {{ messages.seed_1 }}
                                </h3>
                                <p class="text-gray-600">
                                    Commonwealth Bank <br />
                                    BSB: 062-392 <br />
                                    Account number: 1008 5617
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-8 p-4">
                        <div
                            class="bg-white rounded-lg shadow-md flex flex-col justify-center h-[250px]"
                            data-aos="flip-up"
                            data-aos-duration="1200"
                        >
                            <div class="p-4">
                                <h3 class="text-xl font-bold mb-2 text-center">
                                    {{ messages.seed_2 }}
                                </h3>
                                <p class="text-gray-600">
                                    Commonwealth Bank <br />
                                    BSB: 062-188 <br />
                                    Account number: 1071 8534
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="my-8 p-4">
                        <div
                            class="bg-white rounded-lg shadow-md flex flex-col justify-center h-[250px]"
                            data-aos="flip-right"
                            data-aos-duration="1200"
                        >
                            <div class="p-4">
                                <h3 class="text-xl font-bold mb-2 text-center">
                                    {{ messages.seed_3 }}
                                </h3>
                                <p class="text-gray-600">
                                    St. George Bank <br />
                                    BSB: 114-879 <br />
                                    Account number: 497651060
                                </p>
                            </div>
                        </div>
                    </div>
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
