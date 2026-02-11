<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
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
        <title>{{ post.title }} – Anihome</title>
        <meta name="description" :content="post.content.substring(0, 160)" />
    </Head>

    <div class="container mx-auto px-4 py-12">
        <article class="prose lg:prose-xl mx-auto">
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
                class="prose dark:prose-invert max-w-none text-lg leading-relaxed text-foreground"
                v-html="post.content"
            ></div>
        </article>
    </div>
</template>
