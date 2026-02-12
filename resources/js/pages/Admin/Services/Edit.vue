<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import RichTextEditor from '@/components/RichTextEditor.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { Switch } from '@/components/ui/switch';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, update } from '@/routes/admin/services';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    service: {
        id: number;
        title: string;
        description: string;
        content: string;
        is_active: boolean;
        image_path: string | null;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Services',
        href: '/admin/services',
    },
    {
        title: 'Modifier',
        href: '',
    },
];

const form = useForm({
    _method: 'PUT',
    title: props.service.title,
    description: props.service.description,
    content: props.service.content,
    icon: props.service.icon || 'Dog',
    is_active: !!props.service.is_active,
    is_featured: !!props.service.is_featured,
    image: null as File | null,
});

const imagePreview = ref<string | null>(
    props.service.image_path ? `/storage/${props.service.image_path}` : null,
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
        imagePreview.value = props.service.image_path
            ? `/storage/${props.service.image_path}`
            : null;
    }
};

const removeImage = () => {
    form.image = null;
    imagePreview.value = null;
    const input = document.getElementById('image') as HTMLInputElement;
    if (input) input.value = '';
};

const submit = () => {
    form.post(update(props.service.id), {
        forceFormData: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Modifier le Service" />

        <div
            class="mx-auto flex h-full w-full max-w-4xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Modifier le Service</h1>

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

                <div class="space-y-2">
                    <Label for="title">Titre</Label>
                    <Input id="title" v-model="form.title" required />
                    <div v-if="form.errors.title" class="text-sm text-red-500">
                        {{ form.errors.title }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="description">Description courte</Label>
                    <Textarea id="description" v-model="form.description" />
                    <div
                        v-if="form.errors.description"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.description }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="content">Contenu complet</Label>
                    <RichTextEditor v-model="form.content" />
                    <div
                        v-if="form.errors.content"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.content }}
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="space-y-2">
                        <Label for="icon">Icône (Page d'accueil)</Label>
                        <Select v-model:model-value="form.icon">
                            <SelectTrigger>
                                <SelectValue placeholder="Choisir une icône" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="Dog">Chien</SelectItem>
                                <SelectItem value="Cat">Chat</SelectItem>
                                <SelectItem value="Rabbit">Lapin / NAC</SelectItem>
                                <SelectItem value="Footprints">Empreintes / Promenade</SelectItem>
                                <SelectItem value="Home">Maison / À domicile</SelectItem>
                                <SelectItem value="Siren">Urgence</SelectItem>
                                <SelectItem value="Stethoscope">Soins</SelectItem>
                                <SelectItem value="Heart">Amour / Accompagnement</SelectItem>
                            </SelectContent>
                        </Select>
                        <div v-if="form.errors.icon" class="text-sm text-red-500">
                            {{ form.errors.icon }}
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 pt-8">
                        <div class="flex items-center space-x-2">
                            <Switch
                                id="is_active"
                                :model-value="form.is_active"
                                @update:model-value="form.is_active = $event"
                            />
                            <Label for="is_active">Afficher sur le site</Label>
                        </div>

                        <div class="flex items-center space-x-2">
                            <Switch
                                id="is_featured"
                                :model-value="form.is_featured"
                                @update:model-value="form.is_featured = $event"
                            />
                            <Label for="is_featured">Mettre en avant (Accueil)</Label>
                        </div>
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
