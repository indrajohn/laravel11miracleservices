<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div v-for="blog in blogs.data" :key="blog.id" class="mb-4">
                        <h2 class="text-xl font-bold">{{ blog.title }}</h2>
                        <p>{{ blog.content }}</p>
                    </div>

                    <Paginator
                        :rows="10"
                        :totalRecords="120"
                        :rowsPerPageOptions="[10, 20, 30]"
                    ></Paginator>

                    <Paginator
                        :template="{
                            '640px':
                                'PrevPageLink CurrentPageReport NextPageLink',
                            '960px':
                                'FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink',
                            '1300px':
                                'FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink',
                            default:
                                'FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink JumpToPageDropdown JumpToPageInput',
                        }"
                        :rows="10"
                        :totalRecords="120"
                    >
                    </Paginator>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Paginator from "primevue/paginator";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
defineOptions({
    layout: AuthenticatedLayout,
});

const props = defineProps({
    blogs: Object,
});

const blogs = ref(props.blogs);

const onPageChange = (event) => {
    const page = event.page + 1;
    const url = new URL(blogs.value.path);
    url.searchParams.set("page", page);
    router.get(url.toString(), {}, { preserveState: true });
};

watch(
    () => props.blogs,
    (newBlogs) => {
        blogs.value = newBlogs;
    }
);
</script>

<style setup></style>
