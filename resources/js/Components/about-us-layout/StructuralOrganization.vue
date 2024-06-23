<template>
    <section class="bg-gray-100 pb-8 pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">
                        {{ messages.team }}
                    </span>
                </h2>
                <div
                    class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2"
                >
                    <div
                        v-for="(_data, index) in data"
                        :key="index"
                        data-aos="zoom-in-up"
                        data-aos-duration="1200"
                    >
                        <div class="my-8 p-4">
                            <div
                                class="bg-white rounded-lg shadow-md flex flex-col justify-center h-[500px]"
                            >
                                <div class="w-full">
                                    <img
                                        v-if="_data.image && _data.image.src"
                                        :src="_data.image.src"
                                        :alt="_data.image.alt"
                                        width="150"
                                        height="150"
                                        class="rounded-full w-full max-h-[350px] max-w-[350px] mx-auto p-2"
                                    />
                                </div>
                                <div class="p-4">
                                    <h3
                                        class="text-xl font-bold mb-2 text-center"
                                    >
                                        {{ _data.title }}
                                    </h3>
                                    <p class="text-gray-600">
                                        {{ _data.desc }}
                                    </p>
                                </div>
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

const data = ref([
    {
        image: {
            src: "/img/home_pastor1.png",
            alt: "Home Pastor",
        },
        title: "Ps. Effendy Lee - Ps. Lilis Lee ",
        desc: "Home Pastor",
    },
    {
        image: {
            src: "/img/associate_home_pastor1.png",
            alt: "Associate Home Pastor",
        },
        title: "Ps. Tomy",
        desc: "Associate Home Pastor",
    },
    {
        image: {
            src: "/img/service_coordinatior.jpg",
            alt: "Service Coordinator",
        },
        title: "Fandy - Ester",
        desc: "Service Coordinator",
    },
    {
        image: {
            src: "/img/mission_community.png",
            alt: "Mission & Community Service Coordinator",
        },
        title: "Isabella To",
        desc: "Mission & Community Service Coordinator",
    },
]);
</script>
