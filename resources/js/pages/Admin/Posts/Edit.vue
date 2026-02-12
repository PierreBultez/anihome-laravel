<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, update } from '@/routes/admin/posts';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    post: {
        id: number;
        title: string;
        content: string;
        published_at: string | null;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Actualités',
        href: '/admin/posts',
    },
    {
        title: 'Modifier',
        href: '',
    },
];

const form = useForm({
    title: props.post.title,
    content: props.post.content,
    published_at: props.post.published_at
        ? props.post.published_at.split('T')[0]
        : '',
});

const submit = () => {
    form.put(update(props.post.id));
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Modifier l'Article" />

        <div
            class="mx-auto flex h-full w-full max-w-2xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Modifier l'Article</h1>

            <form @submit.prevent="submit" class="space-y-6">
                <div class="space-y-2">
                    <Label for="title">Titre</Label>
                    <Input id="title" v-model="form.title" required />
                    <div v-if="form.errors.title" class="text-sm text-red-500">
                        {{ form.errors.title }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="published_at">Date de publication</Label>
                    <Input
                        id="published_at"
                        type="date"
                        v-model="form.published_at"
                    />
                    <div
                        v-if="form.errors.published_at"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.published_at }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="content">Contenu</Label>
                    <Textarea
                        id="content"
                        v-model="form.content"
                        class="min-h-[300px]"
                    />
                    <div
                        v-if="form.errors.content"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.content }}
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <Button variant="outline" as-child>
                        <Link :href="index()">Annuler</Link>
                    </Button>
                    <Button type="submit" :disabled="form.processing">
                        Enregistrer
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
