<template>
    <section class="bg-gray-100 pb-8 pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-lg md:text-2xl font-bold text-gray-800">
                    <span class="border-b-2 border-gray-500">{{
                        messages.gema
                    }}</span>
                </h2>
                <h3 class="text-md md:text-2xl text-gray-800 my-8">
                    {{ messages.gema_title }}
                </h3>
            </div>
            <div class="space-y-2">
                <p class="space-x-2">
                    <span>{{ messages.gema_step }}</span>
                </p>
                <ul class="space-y-2 list-decimal pl-5">
                    <li>{{ messages.gema_step1 }}</li>
                    <li>{{ messages.gema_step2 }}</li>
                    <li>{{ messages.gema_step3 }}</li>
                    <li>{{ messages.gema_step4 }}</li>
                    <li>{{ messages.gema_step5 }}</li>
                    <li>{{ messages.gema_step6 }}</li>
                    <li>{{ messages.gema_step7 }}</li>
                </ul>
                <swiper :pagination="true" :initial-slide="getInitialSlide()">
                    <swiper-slide
                        v-for="(gema, index) in gemaOld"
                        :key="'slider_' + index"
                    >
                        <CardGema :data="gema" />
                    </swiper-slide>
                </swiper>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";
import moment from "moment";
import CardGema from "./CardGema.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
// import "swiper/swiper-bundle.css";
import "swiper/css";
import "swiper/css/pagination";

const { props } = usePage();
const messages = ref(props.messages);

const gemaOld = [
    {
        title: "= Januari dan Februari = ",
        image: "/img/jan-feb.jpg",
        alt: "gema_januari_dan_februari",
    },
    {
        title: " = Maret dan April = ",
        image: "/img/mar-apr.jpg",
        alt: "gema_maret_dan_april",
    },
    {
        title: "= Mei dan Juni = ",
        image: "/img/mei-jun.jpg",
        alt: "gema_mei_dan_juni",
    },
    {
        title: "= Juli dan Agustus = ",
        image: "/img/jul-agus.jpg",
        alt: "gema_juli_dan_agustus",
    },
    {
        title: "= September dan Oktober = ",
        image: "/img/sept-okt.jpg",
        alt: "gema_sept_dan_okt",
    },
    {
        title: "= November dan Desember = ",
        image: "/img/nov-des.jpg",
        alt: "gema_nov_dan_des",
    },
];

const getInitialSlide = () => {
    const month = moment().month();
    if (month === 0 || month === 1) {
        return 0;
    }
    if (month === 2 || month === 3) {
        return 1;
    }
    if (month === 4 || month === 5) {
        return 2;
    }
    if (month === 6 || month === 7) {
        return 3;
    }
    if (month === 8 || month === 9) {
        return 4;
    }
    if (month === 10 || month === 11) {
        return 5;
    }
};
</script>

<style scoped>
/* Add your styles here if needed */
</style>
