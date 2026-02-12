<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import RichTextEditor from '@/components/RichTextEditor.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, update } from '@/routes/admin/posts';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    post: {
        id: number;
        title: string;
        content: string;
        image_path: string | null;
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
    _method: 'PUT',
    title: props.post.title,
    content: props.post.content,
    published_at: props.post.published_at
        ? props.post.published_at.split('T')[0]
        : '',
    image: null as File | null,
});

const imagePreview = ref<string | null>(
    props.post.image_path ? `/storage/${props.post.image_path}` : null,
);

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
        imagePreview.value = props.post.image_path
            ? `/storage/${props.post.image_path}`
            : null;
    }
};

const removeImage = () => {
    form.image = null;
    imagePreview.value = null;
    const input = document.getElementById('image') as HTMLInputElement;
    if (input) input.value = '';
    // Note: If we want to delete the existing image on the server, we might need a separate flag or action.
    // For now, null image in PUT request usually means "no change" unless we handle deletion specifically.
    // Let's assume uploading a new one replaces it. To delete, we might need a 'delete_image' boolean.
};

const submit = () => {
    form.post(update(props.post.id), {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Modifier l'Article" />

        <div
            class="mx-auto flex h-full w-full max-w-4xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Modifier l'Article</h1>

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
                                Supprimer / Remplacer
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
                        Enregistrer
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
