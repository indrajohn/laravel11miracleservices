<template>
    <div class="w-64 bg-white dark:bg-gray-800 h-screen px-4 py-8">
        <div class="shrink-0 flex items-center mb-8">
            <Link :href="route('dashboard')">
                <!-- <ApplicationLogo
                                            class=""
                                        /> -->
                <span
                    class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                >
                    <img
                        src="/img/logo.png"
                        width="200"
                        height="200"
                        alt="Website Logo"
                        class="mr-2"
                    />
                </span>
            </Link>
        </div>
        <nav>
            <ul>
                <li class="mb-6">
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                    >
                        Dashboard
                    </NavLink>
                </li>
                <li class="mb-6">
                    <NavLink
                        :href="route('blog.index')"
                        :active="route().current('blog.index')"
                    >
                        Blog
                    </NavLink>
                </li>
                <!-- <li class="mb-6">
                    <NavLink
                        :href="route('profile.edit')"
                        :active="route().current('profile.edit')"
                    >
                        Profile
                    </NavLink>
                </li>
                <li class="mb-6">
                    <NavLink :href="route('logout')" method="post" as="button">
                        Log Out
                    </NavLink>
                </li> -->
            </ul>
        </nav>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
</script>
