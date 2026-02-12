<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    photos: Array<{
        id: number;
        title: string;
        path: string;
    }>;
    faqs: Array<{
        question: string;
        answer: string;
    }>;
}>();
</script>

<template>
    <Head>
        <title>Album – Anihome Petsitter à Courthézon</title>
        <meta
            name="description"
            content="Ils ont croisé notre route, une journée ou une vie... notre album photo."
        />
    </Head>

    <div class="bg-background">
        <!-- Header -->
        <div class="bg-muted/30 py-12 text-center">
            <h1 class="text-4xl font-bold text-primary">La grande famille</h1>
        </div>

        <div class="container mx-auto px-4 py-16">
            <div class="mb-16 text-center">
                <h2 class="mb-8 text-3xl font-bold text-primary">
                    Ils ont croisé notre route, une journée ou une vie…
                </h2>

                <div
                    class="mb-12 flex flex-col items-center justify-center gap-8 md:flex-row"
                >
                    <img
                        src="/images/comete_661_503.webp"
                        alt="Comete"
                        class="w-full max-w-md rounded-lg shadow-lg"
                    />
                    <img
                        src="/images/eclair.webp"
                        alt="Eclair"
                        class="w-full max-w-md rounded-lg shadow-lg"
                    />
                </div>

                <div class="mb-8 flex justify-center">
                    <img
                        src="/images/line_separator.png"
                        alt="Separator"
                        class="h-6 w-auto opacity-50"
                    />
                </div>

                <h2 class="mb-8 text-3xl font-bold text-primary">
                    notre album photo
                </h2>
            </div>

            <div
                v-if="photos.length > 0"
                class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4"
            >
                <div
                    v-for="photo in photos"
                    :key="photo.id"
                    class="group relative aspect-square cursor-pointer overflow-hidden rounded-lg bg-muted shadow-sm transition-shadow hover:shadow-md"
                >
                    <img
                        :src="photo.path"
                        :alt="photo.title"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                        loading="lazy"
                    />
                    <div
                        class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 transition-opacity group-hover:opacity-100"
                    >
                        <p class="px-2 text-center font-medium text-white">
                            {{ photo.title }}
                        </p>
                    </div>
                </div>
            </div>

            <div v-else class="py-12 text-center">
                <p class="text-lg text-muted-foreground">
                    Aucune photo dans l'album pour le moment.
                </p>
            </div>
        </div>

        <FaqSection :faqs="faqs" />

        <ProfessionalCareSection 
            text="Vous souhaitez que votre animal fasse partie de notre grande famille ? Contactez Anihome pour une garde personnalisée à Courthézon et ses environs."
        />
    </div>
</template>
