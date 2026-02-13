<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { X } from 'lucide-vue-next';
import { ref } from 'vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Switch } from '@/components/ui/switch';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, update } from '@/routes/admin/testimonials';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    testimonial: {
        id: number;
        name: string;
        content: string;
        is_active: boolean;
        photo_path: string | null;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Témoignages',
        href: '/admin/testimonials',
    },
    {
        title: 'Modifier',
        href: '',
    },
];

const form = useForm({
    _method: 'patch',
    name: props.testimonial.name,
    content: props.testimonial.content,
    is_active: props.testimonial.is_active,
    photo: null as File | null,
});

const getImageUrl = (path: string | null) => {
    if (!path) return null;
    return path.startsWith('http') ? path : `/storage/${path}`;
};

const imagePreview = ref<string | null>(getImageUrl(props.testimonial.photo_path));

const handleImageChange = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files && target.files[0]) {
        const file = target.files[0];
        form.photo = file;

        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target?.result as string;
        };
        reader.readAsDataURL(file);
    } else {
        form.photo = null;
        // Revert to original if no file selected (cancel selection)
        imagePreview.value = getImageUrl(props.testimonial.photo_path);
    }
};

const removeImage = () => {
    form.photo = null;
    const input = document.getElementById('photo') as HTMLInputElement;
    if (input) input.value = '';
    // Revert to original
    imagePreview.value = getImageUrl(props.testimonial.photo_path);
};

const submit = () => {
    form.post(update.url(props.testimonial.id), {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Modifier le Témoignage" />

        <div
            class="mx-auto flex h-full w-full max-w-4xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Modifier le Témoignage</h1>

            <form @submit.prevent="submit" class="space-y-6">
                <!-- Photo -->
                <div class="space-y-2">
                    <Label for="photo">Photo du client (Optionnel)</Label>
                    <div class="flex flex-col gap-4">
                        <Input
                            id="photo"
                            type="file"
                            accept="image/*"
                            @change="handleImageChange"
                        />
                        <div
                            v-if="imagePreview"
                            class="relative w-24 h-24 overflow-hidden rounded-full border"
                        >
                            <img
                                :src="imagePreview"
                                alt="Aperçu"
                                class="h-full w-full object-cover"
                            />
                            <!-- Only show remove button if we have selected a NEW file, to allow cancelling selection.
                                 Deleting the existing image is not implemented yet. -->
                            <Button
                                v-if="form.photo"
                                type="button"
                                variant="destructive"
                                size="icon"
                                class="absolute top-0 right-0 h-6 w-6 rounded-full"
                                @click="removeImage"
                            >
                                <X class="h-3 w-3" />
                            </Button>
                        </div>
                    </div>
                    <div v-if="form.errors.photo" class="text-sm text-red-500">
                        {{ form.errors.photo }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="name">Nom du client</Label>
                    <Input id="name" v-model="form.name" required placeholder="Jean Dupont" />
                    <div v-if="form.errors.name" class="text-sm text-red-500">
                        {{ form.errors.name }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="content">Témoignage</Label>
                    <Textarea id="content" v-model="form.content" required placeholder="Super service, je recommande !" class="min-h-37.5" />
                    <div
                        v-if="form.errors.content"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.content }}
                    </div>
                </div>

                <div class="space-y-2 pt-4">
                    <div class="flex items-center space-x-2">
                        <Switch
                            id="is_active"
                            :model-value="form.is_active"
                            @update:model-value="form.is_active = $event"
                        />
                        <Label for="is_active">Afficher sur le site</Label>
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <Button variant="outline" as-child>
                        <Link :href="index()">Annuler</Link>
                    </Button>
                    <Button type="submit" :disabled="form.processing">
                        Mettre à jour
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
