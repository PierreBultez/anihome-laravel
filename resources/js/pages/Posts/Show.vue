<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    post: {
        title: string;
        content: string;
        image_path: string | null;
        published_at: string;
        user: {
            name: string;
        };
    };
}>();
</script>

<template>
    <Head>
        <title>{{ post.title }} – Anihome Petsitter Courthézon</title>
        <meta name="description" :content="post.content.substring(0, 160).replace(/<[^>]*>?/gm, '')" />
        <meta property="og:title" :content="post.title" />
        <meta property="og:description" :content="post.content.substring(0, 160).replace(/<[^>]*>?/gm, '')" />
        <meta property="og:image" :content="post.image_path ? `https://anihome.fr/storage/${post.image_path}` : 'https://anihome.fr/images/choisir_petsitter.webp'" />
        <meta property="og:type" content="article" />
        <component :is="'script'" type="application/ld+json">
            {{
                JSON.stringify({
                    "@context": "https://schema.org",
                    "@type": "BlogPosting",
                    "headline": post.title,
                    "image": post.image_path ? `https://anihome.fr/storage/${post.image_path}` : "https://anihome.fr/images/Logo.png",
                    "datePublished": post.published_at,
                    "author": {
                        "@type": "Person",
                        "name": post.user.name
                    },
                    "publisher": {
                        "@type": "Organization",
                        "name": "Anihome",
                        "logo": {
                            "@type": "ImageObject",
                            "url": "https://anihome.fr/images/Logo.png"
                        }
                    }
                })
            }}
        </component>
    </Head>

    <div class="container mx-auto px-4 py-12">
        <article class="mx-auto prose lg:prose-xl">
            <h1 class="mb-4 text-center text-4xl font-bold text-primary">
                {{ post.title }}
            </h1>

            <div class="mb-8 text-center text-muted-foreground">
                <span
                    >Publié le
                    {{
                        new Date(post.published_at).toLocaleDateString('fr-FR')
                    }}</span
                >
                <span class="mx-2">•</span>
                <span>Par {{ post.user.name }}</span>
            </div>

            <div v-if="post.image_path" class="mb-8">
                <img
                    :src="`/storage/${post.image_path}`"
                    :alt="post.title"
                    class="h-auto max-h-125 w-full rounded-xl object-cover shadow-lg"
                />
            </div>

            <div
                class="prose max-w-none text-lg leading-relaxed text-foreground dark:prose-invert"
                v-html="post.content"
            ></div>
        </article>
    </div>
    
    <ProfessionalCareSection 
        text="Besoin de faire garder votre animal pendant vos vacances ? Anihome est à votre service à Courthézon, Orange et dans tout le Vaucluse."
    />
</template>
