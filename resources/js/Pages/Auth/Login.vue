<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <section
        class="bg-gray-600 py-16 min-h-screen flex flex-col items-center justify-center content-center"
        data-aos="fade-up"
        data-aos-duration="1200"
    >
        <div class="max-w-md px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div
                    v-if="status"
                    class="mb-4 font-medium text-sm text-green-600"
                >
                    {{ status }}
                </div>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="password"
                            value="Password"
                            class="text-gray-200"
                        />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center text-gray-200">
                            <Checkbox
                                name="remember"
                                v-model:checked="form.remember"
                            />
                            <span class="ms-2 text-sm">Remember me</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        >
                            Forgot your password?
                        </Link> -->

                        <!-- <PrimaryButton
                            class="ms-4 bg-blue-500 hover:bg-blue-700"
                            :class="{ 'opacity-10': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </PrimaryButton> -->

                        <button
                            type="submit"
                            :disabled="form.processing"
                            :class="[
                                form.processing
                                    ? 'bg-blue-300 cursor-not-allowed'
                                    : 'bg-blue-500 hover:bg-blue-700',
                                'text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full',
                            ]"
                        >
                            {{ form.processing ? "Loading..." : "Submit" }}
                        </button>
                    </div>
                    <div class="mt-4 text-gray-200">
                        <small
                            >This site is protected by reCAPTCHA and the Google
                            <a
                                href="https://policies.google.com/privacy"
                                class="text-blue-500"
                                >Privacy Policy</a
                            >
                            and
                            <a
                                href="https://policies.google.com/terms"
                                class="text-blue-500"
                                >Terms of Service</a
                            >
                            apply.
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
