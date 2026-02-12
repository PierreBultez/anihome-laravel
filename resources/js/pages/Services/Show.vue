<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    service: {
        title: string;
        description: string;
        content: string;
        image_path: string | null;
    };
}>();
</script>

<template>
    <Head>
        <title>{{ service.title }} – Anihome</title>
        <meta name="description" :content="service.description" />
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
</template>
