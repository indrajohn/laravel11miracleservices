<template>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-50">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enterFrom="opacity-0"
                enterTo="opacity-100"
                leave="ease-in duration-200"
                leaveFrom="opacity-100"
                leaveTo="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-75" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enterFrom="opacity-0 scale-95"
                        enterTo="opacity-100 scale-100"
                        leave="ease-in duration-200"
                        leaveFrom="opacity-100 scale-100"
                        leaveTo="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full md:max-w-xl max-w-md lg:max-w-3xl transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <div class="w-full h-full flex"></div>
                            <div class="w-full relative">
                                <img
                                    :src="src"
                                    alt="Modal Image"
                                    class="w-full h-full top-0 left-0 rounded-2xl"
                                />
                            </div>
                            <div class="w-full flex items-center">
                                <button
                                    type="button"
                                    class="mx-auto md:p-2 py-2 pl-8 pr-8 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300"
                                    @click="closeModal"
                                >
                                    <span class="text-lg">Close</span>
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";

const props = defineProps({
    isOpen: {
        type: Boolean,
        required: true,
    },
    src: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(["close"]);

function closeModal() {
    emit("close");
}
</script>
