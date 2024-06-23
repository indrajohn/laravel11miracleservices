<template>
    <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end">
                <h2 class="text-md font-bold text-gray-800 pt-16">
                    <div class="border-1 border-red-700 p-3 flex flex-cols">
                        <Link
                            :href="'/'"
                            class="border-b-2 border-blue-300 hover:cursor-pointer mx-3"
                        >
                            Home
                        </Link>
                        <span> / </span>
                        <span class="mx-3">{{
                            usePage().url.replace("/", "")
                        }}</span>
                    </div>
                </h2>
            </div>
        </div>
    </div>
</template>

<script setup>
import { usePage, Link } from "@inertiajs/vue3";
</script>
