<template>
    <div
        v-if="show"
        :class="[
            'toast fixed bottom-4 right-4 p-4 rounded shadow-lg w-64 text-white',
            type === 'success' ? 'bg-green-500' : 'bg-red-500',
        ]"
    >
        <p>{{ message }}</p>
        <button @click="onClose" class="absolute top-2 right-2">X</button>
        <div class="relative pt-1">
            <div
                :class="[
                    'overflow-hidden h-1 mb-2 text-xs flex rounded bg-gray-200',
                    show ? 'animate-toast' : '',
                ]"
            >
                <div
                    :style="{ width: '100%', animationDelay: show ? '0s' : '' }"
                    :class="[
                        'shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center',
                        type === 'success' ? 'bg-green-700' : 'bg-red-700',
                    ]"
                ></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, onMounted, onBeforeUnmount } from "vue";

const props = defineProps({
    type: {
        type: String,
        required: true,
    },
    message: {
        type: String,
        required: true,
    },
    show: {
        type: Boolean,
        required: true,
    },
});

const emit = defineEmits(["close"]);

const timer = ref(null);

const onClose = () => {
    emit("close");
};

watch(
    () => props.show,
    (newShow) => {
        if (newShow) {
            timer.value = setTimeout(() => {
                onClose();
            }, 2000);
        } else {
            clearTimeout(timer.value);
        }
    }
);

onMounted(() => {
    if (props.show) {
        timer.value = setTimeout(() => {
            onClose();
        }, 2000);
    }
});

onBeforeUnmount(() => {
    clearTimeout(timer.value);
});
</script>

<style scoped>
.animate-toast div {
    animation: progress 2s linear;
    animation-fill-mode: forwards;
}

@keyframes progress {
    0% {
        width: 0%;
    }
    100% {
        width: 100%;
    }
}
</style>
