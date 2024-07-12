<template>
    <section class="bg-gray-100 p-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white m-4 rounded-lg py-4">
                <h2
                    class="text-lg md:text-2xl font-bold text-gray-800 mb-4 text-center"
                >
                    <span class="border-b-2 border-gray-500">{{
                        messages.contact_us
                    }}</span>
                </h2>
                <p class="mb-4 text-center">
                    We'd love to hear from you! Whether you have a question,
                    need prayer, or want to get involved, feel free to reach out
                    to us.
                </p>
                <div class="grid gap-4 md:grid-cols-2 grid-cols-1">
                    <div>
                        <form
                            @submit.prevent="recaptcha"
                            class="max-w-lg text-left my-12 mx-auto"
                        >
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrfToken"
                            />
                            <input
                                type="hidden"
                                name="g-recaptcha-response"
                                id="g-recaptcha-response"
                            />
                            <div class="mb-4">
                                <label
                                    for="firstname"
                                    class="block mb-2 text-gray-700"
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
                                <label
                                    for="email"
                                    class="block mb-2 text-gray-700"
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
                                <label
                                    for="phone"
                                    class="block mb-2 text-gray-700"
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
                                <label
                                    for="subject"
                                    class="block mb-2 text-gray-700"
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
                                <label
                                    for="message"
                                    class="block mb-2 text-gray-700"
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
                                    >This site is protected by reCAPTCHA and the
                                    Google
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
                    <div class="space-y-8">
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">
                                Contact Information
                            </h2>
                            <p>
                                <strong>Venue Address:</strong> 9 Missenden Rd,
                                Camperdown, NSW 2050 - Australia
                            </p>
                            <p>
                                <strong>Email:</strong>
                                <a
                                    href="mailto:gbimssydney@gmail.com"
                                    class="text-blue-500"
                                >
                                    gbimssydney@gmail.com</a
                                >
                            </p>
                            <p><strong>Phone:</strong> +61 426113753</p>
                            <p><strong>Office Hours:</strong></p>
                            <ul class="list-disc ml-5">
                                <li>Sunday: 10 AM</li>
                            </ul>
                        </div>

                        <!-- Google Map Embed -->
                        <div class="p-6">
                            <h2 class="text-xl font-bold mb-4">Our Location</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.836306249365!2d144.95543131584097!3d-37.81720997975143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf57726b4f35aa943!2s9%20Missenden%20Rd%2C%20Camperdown%20NSW%202050%2C%20Australia!5e0!3m2!1sen!2sus!4v1616618042373!5m2!1sen!2sus"
                                width="100%"
                                height="300"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                            ></iframe>
                        </div>
                    </div>
                </div>
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
