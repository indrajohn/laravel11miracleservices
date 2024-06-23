<template>
    <section class="bg-gray-100 pb-8 pt-16">
        <div data-aos="zoom-in-up" data-aos-duration="1200">
            <div class="my-8 p-4">
                <div
                    class="rounded-lg shadow-md flex flex-col justify-center h-[500px] bg-white"
                >
                    <div class="w-full">
                        <img
                            src="/img/ps_elijah.png"
                            alt="Senior Pastor"
                            priority
                            width="150"
                            height="150"
                            class="rounded-full w-full max-h-[350px] max-w-[350px] mx-auto p-2"
                        />
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-bold mb-2 text-center">
                            Ps. Elijah (Alexius) Salim
                        </h3>
                        <p class="text-gray-600 text-center">
                            {{ messages.senior_pastor }}
                        </p>
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
