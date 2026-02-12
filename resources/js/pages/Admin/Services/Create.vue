<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Switch } from '@/components/ui/switch';
import { Textarea } from '@/components/ui/textarea';
import AppLayout from '@/layouts/AppLayout.vue';
import { index, store } from '@/routes/admin/services';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Services',
        href: '/admin/services',
    },
    {
        title: 'Créer',
        href: '',
    },
];

const form = useForm({
    title: '',
    description: '',
    content: '',
    is_active: true,
});

const submit = () => {
    form.post(store());
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Créer un Service" />

        <div
            class="mx-auto flex h-full w-full max-w-2xl flex-1 flex-col gap-4 rounded-xl p-4"
        >
            <h1 class="text-2xl font-bold">Nouveau Service</h1>

            <form @submit.prevent="submit" class="space-y-6">
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
                    <Textarea
                        id="content"
                        v-model="form.content"
                        class="min-h-[200px]"
                    />
                    <div
                        v-if="form.errors.content"
                        class="text-sm text-red-500"
                    >
                        {{ form.errors.content }}
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <Switch
                        id="is_active"
                        :checked="form.is_active"
                        @update:checked="form.is_active = $event"
                    />
                    <Label for="is_active">Actif</Label>
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
