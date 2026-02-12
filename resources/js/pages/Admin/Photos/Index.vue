<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { Pencil, Plus, Trash2 } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
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
import { computed, ref } from 'vue';

const props = defineProps<{
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

const selectedIds = ref<number[]>([]);

const allSelected = computed(() => {
    return (
        props.photos.length > 0 &&
        selectedIds.value.length === props.photos.length
    );
});

const toggleAll = () => {
    if (allSelected.value) {
        selectedIds.value = [];
    } else {
        selectedIds.value = props.photos.map((p) => p.id);
    }
};

const toggleSelection = (id: number) => {
    if (selectedIds.value.includes(id)) {
        selectedIds.value = selectedIds.value.filter((i) => i !== id);
    } else {
        selectedIds.value = [...selectedIds.value, id];
    }
};

const deletePhoto = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')) {
        router.delete(destroy(id));
    }
};

const deleteSelected = () => {
    if (
        confirm(
            `Êtes-vous sûr de vouloir supprimer ${selectedIds.value.length} photos ?`,
        )
    ) {
        router.delete('/admin/photos/bulk', {
            data: {
                ids: selectedIds.value,
            },
            onSuccess: () => {
                selectedIds.value = [];
            },
        });
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion de l'Album" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">Album Photo</h1>
                <div class="flex items-center gap-2">
                    <Button
                        v-if="selectedIds.length > 0"
                        variant="destructive"
                        size="sm"
                        @click="deleteSelected"
                    >
                        <Trash2 class="mr-2 h-4 w-4" />
                        Supprimer ({{ selectedIds.length }})
                    </Button>
                    <Button as-child>
                        <Link :href="create()">
                            <Plus class="mr-2 h-4 w-4" />
                            Ajouter une Photo
                        </Link>
                    </Button>
                </div>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-[50px]">
                                <Checkbox
                                    :model-value="allSelected"
                                    @update:model-value="toggleAll()"
                                />
                            </TableHead>
                            <TableHead class="w-25">Aperçu</TableHead>
                            <TableHead>Titre</TableHead>
                            <TableHead class="w-20">Ordre</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="photo in photos" :key="photo.id">
                            <TableCell>
                                <Checkbox
                                    :model-value="
                                        selectedIds.includes(photo.id)
                                    "
                                    @update:model-value="
                                        () => toggleSelection(photo.id)
                                    "
                                />
                            </TableCell>
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
