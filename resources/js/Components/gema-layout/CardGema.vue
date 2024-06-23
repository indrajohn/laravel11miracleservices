<template>
    <div class="bg-gray-100 py-4" @click="toggleModal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">{{
                        data.title
                    }}</span>
                </h2>
                <div
                    class="text-left mt-8 bg-white rounded p-16 shadow-lg"
                    data-aos="zoom-in-down"
                    data-aos-duration="1200"
                >
                    <br />
                    <br />
                    <div class="flex w-full items-center justify-center">
                        <div class="mx-center">
                            <img
                                :src="data.image"
                                :alt="data.alt"
                                width="500"
                                height="500"
                                class="cursor-pointer"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ModalImages :src="data.image" :is-open="isOpen" @close="toggleModal" />
    </div>
</template>

<script>
import ModalImages from "../utils/ModalImages.vue";

export default {
    props: {
        data: {
            type: Object,
            required: true,
        },
    },
    components: {
        ModalImages,
    },
};
</script>
<script setup>
import { ref } from "vue";
const isOpen = ref(false);
const toggleModal = () => {
    isOpen.value = !isOpen.value;
    // console.log("clicked");
};
</script>

<style scoped>
/* Add your styles here if needed */
</style>
