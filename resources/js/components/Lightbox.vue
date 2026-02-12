<script setup lang="ts">
import { ChevronLeft, ChevronRight, X } from 'lucide-vue-next';
import { ref, onMounted, onUnmounted } from 'vue';
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogTitle,
} from '@/components/ui/dialog';

const props = defineProps<{
    photos: Array<{
        id: number;
        title: string;
        path: string;
    }>;
}>();

const isOpen = ref(false);
const currentIndex = ref(0);

const open = (index: number) => {
    currentIndex.value = index;
    isOpen.value = true;
};

const close = () => {
    isOpen.value = false;
};

const next = () => {
    currentIndex.value = (currentIndex.value + 1) % props.photos.length;
};

const prev = () => {
    currentIndex.value =
        (currentIndex.value - 1 + props.photos.length) % props.photos.length;
};

const handleKeydown = (e: KeyboardEvent) => {
    if (!isOpen.value) return;
    if (e.key === 'ArrowRight') next();
    if (e.key === 'ArrowLeft') prev();
    if (e.key === 'Escape') close();
};

onMounted(() => window.addEventListener('keydown', handleKeydown));
onUnmounted(() => window.removeEventListener('keydown', handleKeydown));

defineExpose({ open });
</script>

<template>
    <Dialog :open="isOpen" @update:open="isOpen = $event">
        <DialogContent
            class="max-w-[95vw] border-none bg-transparent p-0 shadow-none sm:max-w-[90vw]"
        >
            <DialogTitle class="sr-only">Agrandissement photo</DialogTitle>
            <DialogDescription class="sr-only">
                Vue plein écran de la photo
                {{ photos[currentIndex]?.title }}
            </DialogDescription>

            <div class="relative flex h-full w-full items-center justify-center">
                <!-- Close Button -->
                <button
                    @click="close"
                    class="absolute -top-12 right-0 z-50 rounded-full bg-black/50 p-2 text-white transition-colors hover:bg-black/70 md:right-4 md:top-4"
                    aria-label="Fermer"
                >
                    <X class="h-6 w-6" />
                </button>

                <!-- Navigation Buttons -->
                <button
                    v-if="photos.length > 1"
                    @click="prev"
                    class="absolute left-0 z-50 flex h-12 w-12 items-center justify-center rounded-full bg-black/30 text-white transition-all hover:bg-black/60 md:left-4"
                    aria-label="Précédent"
                >
                    <ChevronLeft class="h-8 w-8" />
                </button>

                <button
                    v-if="photos.length > 1"
                    @click="next"
                    class="absolute right-0 z-50 flex h-12 w-12 items-center justify-center rounded-full bg-black/30 text-white transition-all hover:bg-black/60 md:right-4"
                    aria-label="Suivant"
                >
                    <ChevronRight class="h-8 w-8" />
                </button>

                <!-- Image and Title -->
                <div class="flex flex-col items-center justify-center">
                    <div class="relative flex max-h-[85vh] w-full items-center justify-center">
                        <img
                            :src="photos[currentIndex]?.path"
                            :alt="photos[currentIndex]?.title"
                            class="max-h-[85vh] max-w-full rounded-lg object-contain shadow-2xl"
                        />
                    </div>
                    <p
                        v-if="photos[currentIndex]?.title"
                        class="mt-4 text-center font-medium text-white drop-shadow-md"
                    >
                        {{ photos[currentIndex]?.title }}
                    </p>
                </div>
            </div>
        </DialogContent>
    </Dialog>
</template>

<style scoped>
:deep([data-radix-collection-item]) {
    outline: none;
}
</style>
