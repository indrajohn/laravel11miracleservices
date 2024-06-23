<template>
    <nav
        :class="[
            'z-50 transition-all duration-200',
            isOnTop && isHome
                ? 'bg-gray-800/10 absolute left-0 right-0'
                : 'bg-gray-800 fixed w-full',
            isOnTop && !isHome ? 'bg-gray-800' : '',
        ]"
    >
        <div class="lg:max-w-7xl mx-auto lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div>
                    <Link :href="'/'">
                        <span
                            class="text-white font-bold text-xl cursor-pointer"
                        >
                            <img
                                src="/img/logo.png"
                                width="250"
                                height="250"
                                alt="Website Logo"
                            />
                        </span>
                    </Link>
                </div>
                <div :class="['hidden md:block', isMenuOpen ? '' : 'hidden']">
                    <div class="lg:ml-10 flex items-baseline lg:space-x-4">
                        <template v-for="(_menu, index) in menu" :key="index">
                            <Link :href="_menu.url">
                                <p
                                    :class="[
                                        'text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm cursor-pointer transition-all',
                                        usePage().url === _menu.url
                                            ? 'text-white font-bold'
                                            : 'font-medium',
                                    ]"
                                >
                                    <span
                                        :class="[
                                            'text-center',
                                            usePage().url === _menu.url
                                                ? 'after:border-b-2 after:border-white after:flex after:pt-2 after:mx-auto after:w-1/2'
                                                : '',
                                        ]"
                                    >
                                        {{ _menu.title }}
                                    </span>
                                </p>
                            </Link>
                        </template>
                        <select
                            v-model="selectedLocale"
                            class="block appearance-none bg-gray-700 border border-gray-700 text-white pr-8 pl-2 py-2 rounded-md text-sm font-medium cursor-pointer focus:outline-none"
                            @change="changeLocale"
                        >
                            <option
                                v-for="option in languageOptions"
                                :key="option.value"
                                :value="option.value"
                            >
                                {{ option.value }}
                            </option>
                        </select>
                    </div>
                </div>

                <button
                    class="md:hidden text-gray-300 hover:text-white focus:outline-none focus:text-white"
                    @click="toggleMenu"
                >
                    <svg
                        class="h-6 w-6 fill-current"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            v-if="isMenuOpen"
                            class="text-white"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M19 13H5v-2h14v2zM19 7H5V5h14v2zM5 17h14v-2H5v2z"
                        />
                        <path
                            v-else
                            class="text-white"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <div
            :class="`md:hidden ${
                isMenuOpen ? 'absolute bg-gray-800 left-0 right-0' : 'hidden'
            }`"
        >
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 flex flex-col">
                <Link
                    v-for="(_menu, index) in menu"
                    :key="index"
                    :href="_menu.url"
                >
                    <p
                        :class="`text-gray-300 hover:text-white block px-3 py-2 rounded-md cursor-pointer ${
                            usePage().url === _menu.url
                                ? 'text-white font-bold'
                                : 'font-medium text-base'
                        }`"
                    >
                        <span>{{ _menu.title }}</span>
                    </p>
                </Link>
                <div class="flex justify-end pr-4">
                    <div class="relative">
                        <select
                            v-model="selectedLocale"
                            class="block appearance-none bg-gray-700 border border-gray-700 text-white pr-8 pl-2 py-2 rounded-md text-sm font-medium cursor-pointer focus:outline-none"
                            @change="changeLocale"
                        >
                            <option
                                v-for="option in languageOptions"
                                :key="option.value"
                                :value="option.value"
                            >
                                {{ option.value }}
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white"
                        >
                            <svg
                                class="h-4 w-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 12a2 2 0 100-4 2 2 0 000 4z"
                                />
                                <path
                                    fill-rule="evenodd"
                                    d="M10 2a8 8 0 100 16 8 8 0 000-16zM0 10a10 10 0 1120 0 10 10 0 01-20 0z"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted } from "vue";
import { usePage, router, Link } from "@inertiajs/vue3";

const languageOptions = [
    { value: "en", label: "English" },
    { value: "id", label: "Indonesian" },
];

const { props, url } = usePage();
const settings = props.settings;
const messages = ref(props.messages);

const selectedLocale = ref(settings.locale);
const isMenuOpen = ref(false);
const isHome = ref(true);
const isOnTop = ref(true);

const updateMenuData = (messages) => [
    { title: messages.home, url: "/" },
    { title: messages.about_us, url: "/about-us" },
    { title: messages.statement_of_faith, url: "/statement-of-faith" },
    { title: messages.seed, url: "/seed" },
    // { title: messages.gallery, url: "/gallery" },
    { title: messages.gema, url: "/gema" },
    { title: messages.contact_us, url: "/contact-us" },
];
const menu = ref(updateMenuData(messages.value));
watch(
    () => messages.value,
    (newMessages) => {
        menu.value = updateMenuData(newMessages);
    },
    { immediate: true }
);

const handleScroll = () => {
    isOnTop.value = window.scrollY < 5;
};

watch(
    () => usePage().url,
    (newUrl) => {
        isHome.value = newUrl === "/";
    },
    { immediate: true }
);

const manageScrollListener = (shouldListen) => {
    if (shouldListen) {
        window.addEventListener("scroll", handleScroll);
    } else {
        window.removeEventListener("scroll", handleScroll);
    }
};

watch(isHome, (newVal) => {
    manageScrollListener(newVal);
});

onMounted(() => {
    if (isHome.value) {
        window.addEventListener("scroll", handleScroll);
    }
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const changeLocale = async () => {
    const locale = selectedLocale.value;

    try {
        await router.visit(`/translations/${locale}`, {
            method: "get",
            onSuccess: (page) => {
                messages.value = page.props.messages;
            },
        });
    } catch (error) {
        console.error("Error changing locale: ", error);
    }
};
</script>

<style scoped>
/* Add any scoped styles here */
</style>
