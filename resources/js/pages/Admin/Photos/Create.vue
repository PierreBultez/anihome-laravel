<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, store } from '@/routes/admin/photos';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Album',
        href: '/admin/photos',
    },
    {
        title: 'Ajouter',
        href: '',
    },
];

const form = useForm({
    title: '',
    image: null as File | null,
    order: 0,
});

const submit = () => {
    form.post(store(), {
        forceFormData: true,
    });
};

const handleFileChange = (e: Event) => {
    const target = e.target as HTMLInputElement;
    if (target.files && target.files[0]) {
        form.image = target.files[0];
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Ajouter une Photo" />

        <div
            class="mx-auto flex h-full w-full max-w-2xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Ajouter une Photo</h1>

            <form @submit.prevent="submit" class="space-y-6">
                <div class="space-y-2">
                    <Label for="title">Titre (optionnel)</Label>
                    <Input id="title" v-model="form.title" />
                    <div v-if="form.errors.title" class="text-sm text-red-500">
                        {{ form.errors.title }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="image">Image</Label>
                    <Input
                        id="image"
                        type="file"
                        accept="image/*"
                        @change="handleFileChange"
                        required
                    />
                    <div v-if="form.errors.image" class="text-sm text-red-500">
                        {{ form.errors.image }}
                    </div>
                </div>

                <div class="space-y-2">
                    <Label for="order">Ordre d'affichage</Label>
                    <Input
                        id="order"
                        type="number"
                        v-model.number="form.order"
                        min="0"
                    />
                    <div v-if="form.errors.order" class="text-sm text-red-500">
                        {{ form.errors.order }}
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <Button variant="outline" as-child>
                        <Link :href="index()">Annuler</Link>
                    </Button>
                    <Button type="submit" :disabled="form.processing">
                        Ajouter
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
