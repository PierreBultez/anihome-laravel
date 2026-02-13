<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import RichTextEditor from '@/components/RichTextEditor.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, store } from '@/routes/admin/posts';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Actualités',
        href: '/admin/posts',
    },
    {
        title: 'Créer',
        href: '',
    },
];

const form = useForm({
    title: '',
    content: '',
    published_at: new Date().toISOString().split('T')[0], // Default to today YYYY-MM-DD
    image: null as File | null,
});

const imagePreview = ref<string | null>(null);

const handleImageChange = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files[0]) {
        const file = target.files[0];
        form.image = file;

        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target?.result as string;
        };
        reader.readAsDataURL(file);
    } else {
        form.image = null;
        imagePreview.value = null;
    }
};

const removeImage = () => {
    form.image = null;
    imagePreview.value = null;
    const input = document.getElementById('image') as HTMLInputElement;
    if (input) input.value = '';
};

const submit = () => {
    form.post(store.url(), {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Créer un Article" />

        <div
            class="mx-auto flex h-full w-full max-w-4xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Nouvel Article</h1>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Image de couverture -->
                <div class="space-y-2">
                    <Label for="image">Image de couverture</Label>
                    <div class="flex flex-col gap-4">
                        <Input
                            id="image"
                            type="file"
                            accept="image/*"
                            @change="handleImageChange"
                        />
                        <div
                            v-if="imagePreview"
                            class="relative w-full max-w-md overflow-hidden rounded-lg border"
                        >
                            <img
                                :src="imagePreview"
                                alt="Aperçu"
                                class="h-48 w-full object-cover"
                            />
                            <Button
                                type="button"
                                variant="destructive"
                                size="sm"
                                class="absolute top-2 right-2"
                                @click="removeImage"
                            >
                                Supprimer
                            </Button>
                        </div>
                    </div>
                    <div v-if="form.errors.image" class="text-sm text-red-500">
                        {{ form.errors.image }}
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="space-y-2">
                        <Label for="title">Titre</Label>
                        <Input id="title" v-model="form.title" required />
                        <div
                            v-if="form.errors.title"
                            class="text-sm text-red-500"
                        >
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
                </div>

                <div class="space-y-2">
                    <Label for="content">Contenu</Label>
                    <RichTextEditor v-model="form.content" />
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
                        Créer
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
