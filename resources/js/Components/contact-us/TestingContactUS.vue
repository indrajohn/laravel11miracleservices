<template>
    <div class="container mx-auto px-4 py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
            <p class="mb-4">
                We'd love to hear from you! Whether you have a question, need
                prayer, or want to get involved, feel free to reach out to us.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div>
                <form
                    action="#"
                    method="POST"
                    class="bg-white p-6 rounded-lg shadow-lg"
                >
                    <div class="mb-4">
                        <label
                            for="first_name"
                            class="block text-sm font-medium text-gray-700"
                            >First Name:</label
                        >
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                    </div>
                    <div class="mb-4">
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                            >Email:</label
                        >
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                    </div>
                    <div class="mb-4">
                        <label
                            for="phone"
                            class="block text-sm font-medium text-gray-700"
                            >Phone:</label
                        >
                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                    </div>
                    <div class="mb-4">
                        <label
                            for="subject"
                            class="block text-sm font-medium text-gray-700"
                            >Subject:</label
                        >
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        />
                    </div>
                    <div class="mb-4">
                        <label
                            for="message"
                            class="block text-sm font-medium text-gray-700"
                            >Message:</label
                        >
                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <small
                            >This site is protected by reCAPTCHA and the Google
                            Privacy Policy and Terms of Service apply.</small
                        >
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information and Map -->
            <div class="space-y-8">
                <!-- Contact Information -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-4">Contact Information</h2>
                    <p>
                        <strong>Venue Address:</strong> 9 Missenden Rd,
                        Camperdown, NSW 2050 - Australia
                    </p>
                    <p>
                        <strong>Email:</strong>
                        <a
                            href="mailto:gbimssydney@gmail.com"
                            class="text-blue-500"
                            >gbimssydney@gmail.com</a
                        >
                    </p>
                    <p><strong>Phone:</strong> +61 426113753</p>
                    <p><strong>Office Hours:</strong></p>
                    <ul class="list-disc ml-5">
                        <li>Monday - Friday: 9 AM - 5 PM</li>
                        <li>Sunday: 8 AM - 1 PM</li>
                    </ul>
                </div>

                <!-- Seed (Donations) -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-4">Seed (Donations)</h2>
                    <p><strong>Seeds & Tithe</strong></p>
                    <p>Commonwealth Bank</p>
                    <p>BSB: 062-392</p>
                    <p>Account number: 1008 5617</p>
                    <p><strong>Building Seeds</strong></p>
                    <p>Commonwealth Bank</p>
                    <p>BSB: 062-188</p>
                    <p>Account number: 1071 8534</p>
                    <p><strong>Mission Seeds</strong></p>
                    <p>St. George Bank</p>
                    <p>BSB: 114-879</p>
                    <p>Account number: 497651060</p>
                </div>

                <!-- Google Map Embed -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
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
</template>

<script>
export default {
    name: "ContactUs",
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
