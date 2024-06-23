<template>
    <section class="bg-gray-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">{{
                        messages.contact_us
                    }}</span>
                </h2>
                <form
                    @submit.prevent="recaptcha"
                    class="max-w-lg text-left my-12 mx-auto"
                >
                    <input type="hidden" name="_token" :value="csrfToken" />
                    <input
                        type="hidden"
                        name="g-recaptcha-response"
                        id="g-recaptcha-response"
                    />
                    <div class="mb-4">
                        <label for="firstname" class="block mb-2 text-gray-700"
                            >First Name:</label
                        >
                        <input
                            v-model="state.firstname"
                            type="text"
                            id="firstname"
                            name="firstname"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-gray-700"
                            >Email:</label
                        >
                        <input
                            v-model="state.email"
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block mb-2 text-gray-700"
                            >Phone:</label
                        >
                        <input
                            v-model="state.phone"
                            type="tel"
                            id="phone"
                            name="phone"
                            required
                            maxlength="11"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block mb-2 text-gray-700"
                            >Subject:</label
                        >
                        <input
                            v-model="state.subject"
                            type="text"
                            id="subject"
                            name="subject"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        />
                    </div>
                    <div class="mb-1">
                        <label for="message" class="block mb-2 text-gray-700"
                            >Message:</label
                        >
                        <textarea
                            v-model="state.message"
                            id="message"
                            name="message"
                            rows="4"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                        ></textarea>
                    </div>
                    <div class="mb-1">
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
                    <button
                        type="submit"
                        :disabled="loading"
                        :class="[
                            loading
                                ? 'bg-blue-300 cursor-not-allowed'
                                : 'bg-blue-500 hover:bg-blue-700',
                            'text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
                        ]"
                    >
                        {{ loading ? "Loading..." : "Submit" }}
                    </button>
                </form>

                <Toast
                    type="success"
                    message="Operation was successful."
                    :show="showSuccessToast"
                    @close="showSuccessToast = false"
                />
                <Toast
                    type="error"
                    message="Something went wrong."
                    :show="showErrorToast"
                    @close="showErrorToast = false"
                />
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { useReCaptcha } from "vue-recaptcha-v3";
import { usePage } from "@inertiajs/vue3";
import Toast from "../utils/Toast.vue";

const { props } = usePage();
const messages = ref(props.messages);
const csrfToken = props.csrf_token; // Add this line to get the CSRF token
const { executeRecaptcha, recaptchaLoaded } = useReCaptcha();

const showSuccessToast = ref(false);
const showErrorToast = ref(false);
const loading = ref(false);
const state = ref({
    firstname: "",
    email: "",
    phone: "",
    subject: "",
    message: "",
});

const clearState = () => {
    state.value = {
        firstname: "",
        email: "",
        phone: "",
        subject: "",
        message: "",
    };
};

const validateError = () => {
    let error = 0;
    if (state.value.firstname === "") error++;
    if (state.value.email === "") error++;
    if (state.value.phone === "") error++;
    if (state.value.subject === "") error++;
    if (state.value.message === "") error++;
    return error !== 0;
};

const recaptcha = async () => {
    await recaptchaLoaded();
    const captchaToken = await executeRecaptcha("contact");
    handleSubmit(captchaToken);
};

const handleSubmit = (captchaToken) => {
    if (validateError()) return;

    loading.value = true;

    const form = useForm({
        firstname: state.value.firstname,
        email: state.value.email,
        phone: state.value.phone,
        subject: state.value.subject,
        message: state.value.message,
        "g-recaptcha-response": captchaToken,
        _token: csrfToken,
    });

    form.post("/contact", {
        onSuccess: () => {
            showSuccessToast.value = true;
            clearState();
        },
        onError: () => {
            showErrorToast.value = true;
        },
        onFinish: () => {
            loading.value = false;
        },
    });
};
</script>

<style scoped>
/* Add your styles here */
</style>
