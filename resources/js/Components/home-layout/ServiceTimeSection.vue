<template>
    <section
        class="bg-gray-100 py-16 min-h-screen"
        data-aos="fade-up"
        data-aos-duration="1200"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    {{ messages.join_us_this_sunday }}
                </h2>
                <p class="text-md text-gray-600 mt-4">
                    {{ messages.join_us_this_sunday }}
                </p>
                <div class="mt-8">
                    <h3 class="text-md md:text-2xl font-bold text-gray-800">
                        {{ messages.services_time }}
                    </h3>
                    <p class="text-md text-gray-600 mt-2">10:00AM</p>
                    <p class="text-gray-600 mt-2">
                        ({{ messages.services_time_additional_information }})
                    </p>
                </div>
                <div class="mt-8">
                    <h3 class="text-lg md:text-2xl font-bold text-gray-800">
                        {{ messages.venue_address }}
                    </h3>
                    <p class="text-md text-gray-600 mt-2">
                        9 Missenden Rd, Camperdown, NSW 2050 - Australia
                    </p>
                    <p class="text-gray-600 mt-2">
                        <a
                            href="https://goo.gl/maps/arSbwTv8xnYRa9pp8"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-blue-500 hover:underline"
                        >
                            {{ messages.view_on_google_maps }}
                        </a>
                    </p>
                </div>
                <div class="mt-8">
                    <h3 class="text-md md:text-2xl font-bold text-gray-800">
                        Zoom
                    </h3>
                    <p class="text-md text-gray-600 mt-2">
                        <span class="block">ID : 953 057 8734 </span>
                        <span class="block">Pass : church</span>
                        <span class="block">or :</span>
                    </p>
                    <a
                        href="https://us06web.zoom.us/j/9530578734?pwd=4Zn012T4O64BDC3AqzlHPZFaLXkLjw.1"
                        class="text-blue-500 hover:underline inline-block"
                        target="_blank"
                    >
                        https://us06web.zoom.us/j/9530578734?pwd=4Zn012T4O64BDC3AqzlHPZFaLXkLjw.1
                    </a>
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
