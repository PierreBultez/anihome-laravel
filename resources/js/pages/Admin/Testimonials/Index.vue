<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import { Pencil, Plus, Trash2 } from 'lucide-vue-next';
import { computed, ref } from 'vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Switch } from '@/components/ui/switch';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { create, destroy, edit, update } from '@/routes/admin/testimonials';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    testimonials: Array<{
        id: number;
        name: string;
        content: string;
        photo_path: string | null;
        is_active: boolean;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Témoignages',
        href: '/admin/testimonials',
    },
];

const selectedIds = ref<number[]>([]);

const allSelected = computed(() => {
    return (
        props.testimonials.length > 0 &&
        selectedIds.value.length === props.testimonials.length
    );
});

const toggleAll = (checked: boolean) => {
    if (checked) {
        selectedIds.value = props.testimonials.map((t) => t.id);
    } else {
        selectedIds.value = [];
    }
};

const toggleSelection = (id: number, checked: boolean) => {
    if (checked) {
        selectedIds.value = [...selectedIds.value, id];
    } else {
        selectedIds.value = selectedIds.value.filter((i) => i !== id);
    }
};

const deleteTestimonial = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce témoignage ?')) {
        router.delete(destroy(id));
    }
};

const deleteSelected = () => {
    if (
        confirm(
            `Êtes-vous sûr de vouloir supprimer ${selectedIds.value.length} témoignages ?`,
        )
    ) {
        router.delete('/admin/testimonials/bulk', {
            data: {
                ids: selectedIds.value,
            },
            onSuccess: () => {
                selectedIds.value = [];
            },
        });
    }
};

const toggleStatus = (testimonial: { id: number; is_active: boolean }) => {
    router.visit(update(testimonial.id), {
        method: 'patch',
        data: {
            is_active: !testimonial.is_active,
        },
        preserveScroll: true,
        preserveState: true,
    });
};

const getImageUrl = (path: string | null) => {
    if (!path) return null;
    return path.startsWith('http') ? path : `/storage/${path}`;
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion des Témoignages" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">Témoignages</h1>
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
                            Nouveau Témoignage
                        </Link>
                    </Button>
                </div>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead class="w-12.5">
                                <Checkbox
                                    :model-value="allSelected"
                                    @update:model-value="
                                        (checked: any) => toggleAll(!!checked)
                                    "
                                />
                            </TableHead>
                            <TableHead class="w-20">Photo</TableHead>
                            <TableHead>Nom</TableHead>
                            <TableHead>Message</TableHead>
                            <TableHead class="w-25">Statut</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="testimonial in testimonials" :key="testimonial.id">
                            <TableCell>
                                <Checkbox
                                    :model-value="
                                        selectedIds.includes(testimonial.id)
                                    "
                                    @update:model-value="
                                        (checked: any) =>
                                            toggleSelection(
                                                testimonial.id,
                                                !!checked,
                                            )
                                    "
                                />
                            </TableCell>
                            <TableCell>
                                <div class="h-10 w-10 overflow-hidden rounded-full bg-gray-100">
                                    <img
                                        v-if="testimonial.photo_path"
                                        :src="getImageUrl(testimonial.photo_path) || ''"
                                        :alt="testimonial.name"
                                        class="h-full w-full object-cover"
                                    />
                                    <div v-else class="flex h-full w-full items-center justify-center text-gray-400">
                                        <span class="text-xs">No img</span>
                                    </div>
                                </div>
                            </TableCell>
                            <TableCell class="font-medium">{{
                                testimonial.name
                            }}</TableCell>
                            <TableCell class="max-w-md truncate">{{
                                testimonial.content
                            }}</TableCell>
                            <TableCell>
                                <div class="flex items-center space-x-2">
                                    <Switch
                                        :model-value="testimonial.is_active"
                                        @update:model-value="
                                            toggleStatus(testimonial)
                                        "
                                    />
                                    <span class="text-sm text-muted-foreground">
                                        {{
                                            testimonial.is_active
                                                ? 'Actif'
                                                : 'Inactif'
                                        }}
                                    </span>
                                </div>
                            </TableCell>
                            <TableCell class="text-right">
                                <div class="flex justify-end gap-2">
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        as-child
                                    >
                                        <Link :href="edit(testimonial.id)">
                                            <Pencil class="h-4 w-4" />
                                        </Link>
                                    </Button>
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        class="text-red-600 hover:bg-red-50 hover:text-red-700"
                                        @click="deleteTestimonial(testimonial.id)"
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
