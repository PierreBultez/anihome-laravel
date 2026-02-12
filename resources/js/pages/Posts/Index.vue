<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import {
    Card,
    CardHeader,
    CardTitle,
    CardContent,
    CardFooter,
} from '@/components/ui/card';
import FaqSection from '@/components/sections/FaqSection.vue';
import ProfessionalCareSection from '@/components/sections/ProfessionalCareSection.vue';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    posts: Array<{
        id: number;
        title: string;
        slug: string;
        content: string;
        published_at: string;
        image_path: string | null;
    }>;
    faqs: Array<{
        question: string;
        answer: string;
    }>;
}>();

const stripHtml = (html: string) => {
    return html.replace(/<[^>]*>?/gm, '');
};
</script>

<template>
    <Head>
        <title>Actualité – Anihome Petsitter à Courthézon</title>
        <meta
            name="description"
            content="L'actualité des animaux. Conseils, astuces, informations..."
        />
    </Head>

    <div class="container mx-auto px-4 py-12">
        <h1 class="mb-12 text-center text-4xl font-bold text-primary">
            L'actualité des animaux
        </h1>

        <div
            v-if="posts.length > 0"
            class="grid gap-8 md:grid-cols-2 lg:grid-cols-3"
        >
            <Card
                v-for="post in posts"
                :key="post.id"
                class="flex h-full flex-col transition-shadow hover:shadow-lg"
            >
                <div
                    v-if="post.image_path"
                    class="h-48 overflow-hidden rounded-t-xl"
                >
                    <img
                        :src="`/storage/${post.image_path}`"
                        :alt="post.title"
                        class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
                    />
                </div>
                <CardHeader>
                    <div class="mb-2 text-sm text-muted-foreground">
                        {{
                            new Date(post.published_at).toLocaleDateString(
                                'fr-FR',
                            )
                        }}
                    </div>
                    <CardTitle class="line-clamp-2">{{ post.title }}</CardTitle>
                </CardHeader>
                <CardContent class="grow">
                    <p class="line-clamp-3 text-muted-foreground">
                        {{ stripHtml(post.content) }}
                    </p>
                </CardContent>
                <CardFooter>
                    <Button variant="outline" as-child class="w-full">
                        <Link :href="`/actualite/${post.slug}`"
                            >Lire la suite</Link
                        >
                    </Button>
                </CardFooter>
            </Card>
        </div>

        <div v-else class="py-12 text-center">
            <p class="text-lg text-muted-foreground">
                Aucun article pour le moment.
            </p>
        </div>
    </div>
    
    <FaqSection :faqs="faqs" />

    <ProfessionalCareSection 
        text="Restez informé avec Anihome, votre expert en garde d'animaux à Courthézon et ses environs (Orange, Sorgues, Bédarrides). Des conseils de pros pour vos compagnons."
    />
</template>
