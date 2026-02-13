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
import { create, destroy, edit, update } from '@/routes/admin/faqs';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    faqs: Array<{
        id: number;
        question: string;
        answer: string;
        is_active: boolean;
        order: number;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'FAQs',
        href: '/admin/faqs',
    },
];

const selectedIds = ref<number[]>([]);

const allSelected = computed(() => {
    return (
        props.faqs.length > 0 &&
        selectedIds.value.length === props.faqs.length
    );
});

const toggleAll = (checked: boolean) => {
    if (checked) {
        selectedIds.value = props.faqs.map((f) => f.id);
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

const deleteFaq = (id: number) => {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette FAQ ?')) {
        router.delete(destroy(id));
    }
};

const deleteSelected = () => {
    if (
        confirm(
            `Êtes-vous sûr de vouloir supprimer ${selectedIds.value.length} FAQs ?`,
        )
    ) {
        router.delete('/admin/faqs/bulk', {
            data: {
                ids: selectedIds.value,
            },
            onSuccess: () => {
                selectedIds.value = [];
            },
        });
    }
};

const toggleStatus = (faq: { id: number; is_active: boolean }) => {
    router.visit(update(faq.id), {
        method: 'patch',
        data: {
            is_active: !faq.is_active,
        },
        preserveScroll: true,
        preserveState: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Gestion de la FAQ" />

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">FAQ</h1>
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
                            Nouvelle FAQ
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
                            <TableHead class="w-12.5">Ordre</TableHead>
                            <TableHead>Question</TableHead>
                            <TableHead>Réponse</TableHead>
                            <TableHead class="w-25">Statut</TableHead>
                            <TableHead class="text-right">Actions</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="faq in faqs" :key="faq.id">
                            <TableCell>
                                <Checkbox
                                    :model-value="
                                        selectedIds.includes(faq.id)
                                    "
                                    @update:model-value="
                                        (checked: any) =>
                                            toggleSelection(
                                                faq.id,
                                                !!checked,
                                            )
                                    "
                                />
                            </TableCell>
                            <TableCell>{{ faq.order }}</TableCell>
                            <TableCell class="font-medium">{{
                                faq.question
                            }}</TableCell>
                            <TableCell class="max-w-md truncate">{{
                                faq.answer
                            }}</TableCell>
                            <TableCell>
                                <div class="flex items-center space-x-2">
                                    <Switch
                                        :model-value="faq.is_active"
                                        @update:model-value="
                                            toggleStatus(faq)
                                        "
                                    />
                                    <span class="text-sm text-muted-foreground">
                                        {{
                                            faq.is_active
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
                                        <Link :href="edit(faq.id)">
                                            <Pencil class="h-4 w-4" />
                                        </Link>
                                    </Button>
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        class="text-red-600 hover:bg-red-50 hover:text-red-700"
                                        @click="deleteFaq(faq.id)"
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
