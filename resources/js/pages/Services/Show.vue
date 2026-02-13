<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import TestimonialsSection from '@/components/sections/TestimonialsSection.vue';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    service: {
        title: string;
        description: string;
        content: string;
        image_path: string | null;
    };
    testimonials: Array<{
        id: number;
        name: string;
        content: string;
        photo_path: string | null;
    }>;
    faqs: Array<{
        question: string;
        answer: string;
    }>;
}>();
</script>

<template>
    <Head>
        <title>{{ service.title }} à Courthézon (84) – Anihome</title>
        <meta name="description" :content="service.description" />
        <meta property="og:title" :content="service.title + ' à Courthézon (84) – Anihome'" />
        <meta property="og:description" :content="service.description" />
        <meta property="og:image" :content="service.image_path ? `https://anihome.fr/storage/${service.image_path}` : 'https://anihome.fr/images/choisir_petsitter.webp'" />
        <meta property="og:type" content="website" />
        <component :is="'script'" type="application/ld+json">
            {{
                JSON.stringify({
                    "@context": "https://schema.org",
                    "@type": "Service",
                    "name": service.title,
                    "description": service.description,
                    "provider": {
                        "@type": "LocalBusiness",
                        "name": "Anihome",
                        "address": {
                            "@type": "PostalAddress",
                            "addressLocality": "Courthézon",
                            "postalCode": "84350",
                            "addressRegion": "Vaucluse",
                            "addressCountry": "FR"
                        }
                    },
                    "areaServed": [
                        { "@type": "City", "name": "Courthézon" },
                        { "@type": "City", "name": "Orange" },
                        { "@type": "City", "name": "Jonquières" },
                        { "@type": "City", "name": "Bédarrides" },
                        { "@type": "City", "name": "Sarrians" }
                    ]
                })
            }}
        </component>
    </Head>

    <div class="container mx-auto px-4 py-12">
        <h1 class="mb-8 text-center text-4xl font-bold text-primary">
            {{ service.title }}
        </h1>

        <div v-if="service.image_path" class="mx-auto mb-8 max-w-3xl">
            <img
                :src="`/storage/${service.image_path}`"
                :alt="service.title"
                class="h-auto w-full rounded-xl object-cover shadow-lg"
            />
        </div>

        <div
            class="mx-auto prose max-w-3xl text-lg leading-relaxed text-muted-foreground dark:prose-invert"
            v-html="service.content"
        ></div>
    </div>

    <TestimonialsSection :testimonials="testimonials" />

    <FaqSection :faqs="faqs" />
    
    <ProfessionalCareSection 
        text="Un service de qualité pour vos animaux à Courthézon. Nous intervenons rapidement à Orange, Sorgues et alentours pour assurer le bien-être de votre compagnon."
    />
</template>
