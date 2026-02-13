<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { watch } from 'vue';

defineProps<{
    items: { title: string; href: string }[];
    contactItem: { title: string; href: string };
}>();

const isOpen = defineModel<boolean>('isOpen', { default: false });

const toggle = () => {
    isOpen.value = !isOpen.value;
};

watch(isOpen, (value) => {
    if (typeof document !== 'undefined') {
        document.body.style.overflow = value ? 'hidden' : '';
    }
});
</script>

<template>
    <div>
        <!-- Modern Hamburger Button -->
        <button
            @click="toggle"
            class="relative z-110 flex h-12 w-12 flex-col items-center justify-center gap-1.5 rounded-full border border-primary/10 transition-all focus:outline-none"
            :class="[
                isOpen ? 'bg-white hover:bg-white/90' : 'bg-background hover:bg-primary/5'
            ]"
            aria-label="Menu"
        >
            <span
                class="h-0.5 w-6 bg-primary transition-all duration-300 ease-out"
                :class="{ 'translate-y-2 rotate-45': isOpen }"
            ></span>
            <span
                class="h-0.5 w-6 bg-primary transition-all duration-300 ease-out"
                :class="{ 'opacity-0': isOpen }"
            ></span>
            <span
                class="h-0.5 w-6 bg-primary transition-all duration-300 ease-out"
                :class="{ '-translate-y-2 -rotate-45': isOpen }"
            ></span>
        </button>

        <!-- Full Screen Overlay -->
        <Transition
            enter-active-class="transition duration-500 ease-out"
            enter-from-class="opacity-0 translate-y-full rounded-t-[100%]"
            enter-to-class="opacity-100 translate-y-0 rounded-t-none"
            leave-active-class="transition duration-500 ease-in"
            leave-from-class="opacity-100 translate-y-0 rounded-t-none"
            leave-to-class="opacity-0 translate-y-full rounded-t-[100%]"
        >
            <div
                v-if="isOpen"
                class="fixed inset-0 z-100 flex h-svh w-screen flex-col items-center justify-center bg-primary text-primary-foreground"
            >
                <!-- Decorative Elements -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
                     <svg class="absolute -top-1/4 -left-1/4 w-[150%] h-[150%] animate-spin-slow" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="0.5" fill="none" stroke-dasharray="4 4" />
                        <circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="0.5" fill="none" stroke-dasharray="2 4" />
                     </svg>
                </div>

                <nav class="relative z-10 flex flex-col items-center gap-8 text-center">
                    <Link
                        v-for="(item, index) in items"
                        :key="item.href"
                        :href="item.href"
                        @click="toggle"
                        class="group relative overflow-hidden text-4xl font-heading font-bold uppercase tracking-wider md:text-6xl"
                        :class="{ 'animate-in fade-in slide-in-from-bottom-8': isOpen }"
                        :style="{ animationDelay: `${index * 100}ms`, animationFillMode: 'both' }"
                    >
                        <span class="relative z-10 transition-colors duration-300 group-hover:text-white/80">
                            {{ item.title }}
                        </span>
                        <span class="absolute inset-x-0 bottom-0 h-1 w-full origin-left scale-x-0 bg-white transition-transform duration-300 ease-out group-hover:scale-x-100" />
                    </Link>

                    <div
                        class="mt-8"
                        :class="{ 'animate-in fade-in slide-in-from-bottom-8': isOpen }"
                        :style="{ animationDelay: `${items.length * 100}ms`, animationFillMode: 'both' }"
                    >
                        <Link
                            :href="contactItem.href"
                            @click="toggle"
                            class="inline-flex items-center justify-center rounded-full bg-white px-8 py-4 text-lg font-bold text-primary transition-transform hover:scale-105 active:scale-95"
                        >
                            {{ contactItem.title }}
                        </Link>
                    </div>
                </nav>

                <!-- Footer Info -->
                <div class="absolute bottom-8 left-0 w-full text-center text-primary-foreground/60 text-sm">
                    <p>Courthézon, Vaucluse • 06.41.13.75.20</p>
                </div>
            </div>
        </Transition>
    </div>
</template>

<style scoped>
.animate-spin-slow {
    animation: spin 60s linear infinite;
}
@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>
