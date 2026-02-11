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
import { create, destroy, edit, update } from '@/routes/admin/services';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    services: Array<{
        id: number;
        title: string;
        description: string;
        is_active: boolean;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Services',
        href: '/admin/services',
    },
];

const selectedIds = ref<number[]>([]);

const allSelected = computed(() => {
    return (
        props.services.length > 0 &&
        selectedIds.value.length === props.services.length
    );
});

const toggleAll = (checked: boolean) => {
    if (checked) {
        selectedIds.value = props.services.map((s) => s.id);
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

const deleteService = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce service ?')) {
        router.delete(destroy(id));
    }
};

const deleteSelected = () => {
    if (
        confirm(
            `Êtes-vous sûr de vouloir supprimer ${selectedIds.value.length} services ?`,
        )
    ) {
        router.delete('/admin/services/bulk', {
            data: {
                ids: selectedIds.value,
            },
            onSuccess: () => {
                selectedIds.value = [];
            },
        });
    }
};

const toggleStatus = (service: { id: number; is_active: boolean }) => {
    router.visit(update(service.id), {
        method: 'patch',
        data: {
            is_active: !service.is_active,
        },
        preserveScroll: true,
        preserveState: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion des Services" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">Services</h1>
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
                            Nouveau Service
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
                                    :checked="allSelected"
                                    @update:checked="(checked: any) => toggleAll(!!checked)"
                                />
                            </TableHead>
                            <TableHead>Titre</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead class="w-[100px]">Statut</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="service in services" :key="service.id">
                            <TableCell>
                                <Checkbox 
                                    :checked="selectedIds.includes(service.id)"
                                    @update:checked="(checked: any) => toggleSelection(service.id, !!checked)"
                                />
                            </TableCell>
                            <TableCell class="font-medium">{{
                                service.title
                            }}</TableCell>
                            <TableCell class="max-w-md truncate">{{
                                service.description
                            }}</TableCell>
                            <TableCell>
                                <div class="flex items-center space-x-2">
                                    <Switch
                                        :checked="!!service.is_active"
                                        @update:checked="toggleStatus(service)"
                                    />
                                    <span class="text-sm text-muted-foreground">
                                        {{
                                            service.is_active
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
                                        <Link :href="edit(service.id)">
                                            <Pencil class="h-4 w-4" />
                                        </Link>
                                    </Button>
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        class="text-red-600 hover:bg-red-50 hover:text-red-700"
                                        @click="deleteService(service.id)"
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
