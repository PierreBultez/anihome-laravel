<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/layouts/MainLayout.vue';

defineOptions({ layout: MainLayout });

defineProps<{
    service: {
        title: string;
        description: string;
        content: string;
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
        <div
            class="prose mx-auto max-w-3xl text-lg leading-relaxed text-muted-foreground"
        >
            {{ service.content }}
        </div>
    </div>
</template>
