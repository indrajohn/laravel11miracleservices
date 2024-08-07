import "../css/app.css";
import "aos/dist/aos.css";
import "nprogress/nprogress.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import AOS from "aos";
import { createHead } from "@unhead/vue";
import { router } from "@inertiajs/vue3";
import NProgress from "nprogress";
import GuestLayout from "./Layouts/GuestLayout.vue";
import PrimeVue from "primevue/config";
import Aura from "@primevue/themes/aura";
import Lara from "../css/Lara";
import "primeicons/primeicons.css";
import { VueReCaptcha } from "vue-recaptcha-v3";
import VueGtag from "vue-gtag";
AOS.init();
let timeout = null;

const head = createHead();
router.on("start", () => {
    timeout = setTimeout(() => NProgress.start(), 250);
});

router.on("progress", (event) => {
    if (NProgress.isStarted() && event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9);
    }
});

router.on("finish", (event) => {
    clearTimeout(timeout);
    if (!NProgress.isStarted()) {
        return;
    } else if (event.detail.visit.completed) {
        NProgress.done();
    } else if (event.detail.visit.interrupted) {
        NProgress.set(0);
    } else if (event.detail.visit.cancelled) {
        NProgress.done();
        NProgress.remove();
    }
});
createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        if (!page) {
            throw new Error(`Page ${name} not found`);
        }
        page.default.layout = page.default.layout || GuestLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        const captcheKey = props.initialPage.props.recaptcha_site_key;
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(head)
            // .use(PrimeVue, {
            //     theme: {
            //         preset: Lara,
            //     },
            // })
            .use(PrimeVue, {
                unstyled: true,
                pt: Lara,
            })
            .use(ZiggyVue);
        app.use(VueReCaptcha, {
            siteKey: captcheKey,
            loaderOptions: { useRecaptchaNet: true },
        });
        app.use(VueGtag, {
            config: { id: "G-NXF32MLCHQ" },
        });
        app.mount(el);
    },

    progress: {
        color: "#4B5563",
    },
});
