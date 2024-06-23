<template>
    <div class="my-8 p-4">
        <div
            class="bg-white md:h-[300px] h-[400px] rounded-lg shadow-md flex flex-col justify-center"
        >
            <div class="w-full">
                <div
                    v-if="data?.imageComponent"
                    class="rounded-lg w-full text-center max-h-[250px] max-w-[250px] mx-auto"
                    v-html="data.imageComponent"
                ></div>
                <img
                    v-else-if="data?.image?.src"
                    :src="data.image.src"
                    :alt="data.image.alt"
                    :width="300"
                    :height="300"
                    class="rounded-lg w-full max-h-[250px] max-w-[250px] mx-auto"
                />
            </div>
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2 text-center">
                    {{ data?.title }}
                </h3>
                <p class="text-gray-600">{{ data?.desc }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    data: {
        type: Object,
        required: true,
    },
});
</script>

<style scoped>
/* Add any scoped styles here if necessary */
</style>
