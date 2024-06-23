<template>
    <footer class="bg-gray-800 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <Link :href="'/'">
                        <span class="flex items-center text-white">
                            <img
                                src="/img/logo.png"
                                width="250"
                                height="250"
                                alt="Website Logo"
                                class="mr-2"
                            />
                        </span>
                    </Link>
                </div>
                <div>
                    <h4 class="text-white text-lg font-bold mb-2">
                        {{ usePage().props.messages.contact_us }}
                    </h4>
                    <p class="text-gray-300">
                        {{ usePage().props.messages.venue_address }}: 9
                        Missenden Rd, Camperdown, NSW 2050 - Australia
                        <br />
                        Email: gbimssydney@gmail.com
                        <br />
                        Phone: +61 426113753
                    </p>
                </div>
                <div>
                    <h4 class="text-white text-lg font-bold mb-2">
                        {{ usePage().props.messages.seed }}
                    </h4>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-gray-300">
                            <span class="font-bold">
                                {{ usePage().props.messages.seed_1 }}
                            </span>
                            <br />
                            Commonwealth Bank <br />
                            BSB: 062-392 <br />
                            Account number: 1008 5617
                        </p>
                        <p class="text-gray-300">
                            <span class="font-bold">
                                {{ usePage().props.messages.seed_2 }}</span
                            >
                            <br />
                            Commonwealth Bank <br />
                            BSB: 062-188 <br />
                            Account number: 1071 8534
                        </p>
                        <p class="text-gray-300">
                            <span class="font-bold">
                                {{ usePage().props.messages.seed_3 }}
                            </span>
                            <br />
                            St. George Bank <br />
                            BSB: 114-879 <br />
                            Account number: 497651060
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { usePage, Link } from "@inertiajs/vue3";
</script>
