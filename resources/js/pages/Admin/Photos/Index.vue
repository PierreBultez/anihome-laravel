<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { Pencil, Plus, Trash2 } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { create, destroy, edit } from '@/routes/admin/photos';
import { type BreadcrumbItem } from '@/types';

defineProps<{
    photos: Array<{
        id: number;
        title: string | null;
        path: string;
        order: number;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Album',
        href: '/admin/photos',
    },
];

const deletePhoto = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')) {
        router.delete(destroy(id));
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion de l'Album" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">Album Photo</h1>
                <Button as-child>
                    <Link :href="create()">
                        <Plus class="mr-2 h-4 w-4" />
                        Ajouter une Photo
                    </Link>
                </Button>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-25">Aperçu</TableHead>
                            <TableHead>Titre</TableHead>
                            <TableHead class="w-20">Ordre</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="photo in photos" :key="photo.id">
                            <TableCell>
                                <img
                                    :src="photo.path"
                                    :alt="photo.title || 'Photo'"
                                    class="h-12 w-12 rounded bg-muted object-cover"
                                />
                            </TableCell>
                            <TableCell class="font-medium">{{
                                photo.title || '-'
                            }}</TableCell>
                            <TableCell>{{ photo.order }}</TableCell>
                            <TableCell class="text-right">
                                <div class="flex justify-end gap-2">
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        as-child
                                    >
                                        <Link :href="edit(photo.id)">
                                            <Pencil class="h-4 w-4" />
                                        </Link>
                                    </Button>
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        class="text-red-600 hover:bg-red-50 hover:text-red-700"
                                        @click="deletePhoto(photo.id)"
                                    >
                                        <Trash2 class="h-4 w-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                    </TableBody>
                </Table>
            </div>
        </div>
    </AppLayout>
</template>
