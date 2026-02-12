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
import { create, destroy, edit } from '@/routes/admin/services';
import { type BreadcrumbItem } from '@/types';

defineProps<{
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

const deleteService = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce service ?')) {
        router.delete(destroy(id));
    }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion des Services" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">Services</h1>
                <Button as-child>
                    <Link :href="create()">
                        <Plus class="mr-2 h-4 w-4" />
                        Nouveau Service
                    </Link>
                </Button>
            </div>

            <div class="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Titre</TableHead>
                            <TableHead>Description</TableHead>
                            <TableHead class="w-[100px]">Statut</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="service in services" :key="service.id">
                            <TableCell class="font-medium">{{
                                service.title
                            }}</TableCell>
                            <TableCell class="max-w-md truncate">{{
                                service.description
                            }}</TableCell>
                            <TableCell>
                                <span
                                    class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                                    :class="
                                        service.is_active
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800'
                                    "
                                >
                                    {{
                                        service.is_active ? 'Actif' : 'Inactif'
                                    }}
                                </span>
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
